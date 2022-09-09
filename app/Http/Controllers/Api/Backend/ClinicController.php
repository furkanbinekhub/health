<?php

namespace App\Http\Controllers\Api\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClinicUpdateRequest;
use App\Http\Requests\DoctorTreatmentStoreRequest;
use App\Models\Clinic;
use App\Models\Doctor;
use App\Models\DoctorTreatment;
use App\Models\Treatment;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    public function update(ClinicUpdateRequest $request, Clinic $clinic)
    {
        $clinic->update($request->validationData());

        return response()->json([
            "clinic" => $clinic
        ]);
    }

    public function doctorTreatmentStore(DoctorTreatmentStoreRequest $request)
    {
        DoctorTreatment::create($request->validationData());
        return response()->json([
            "success" => true
        ]);
    }

    public function getTreatments()
    {
        $treatments = Treatment::getByClinicId(auth()->user()->getAuthIdentifier());
        return response()->json($treatments);
    }

    public function getDoctors(Treatment $treatment)
    {
        if (!$treatment)
             return response()->json();

        $doctors = DoctorTreatment::with(['treatment', 'doctor'])
            ->where('treatment_id', $treatment->id)->get();

        return response()->json($doctors);
    }

}
