<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function treatments()
    {
        return $this->hasMany(DoctorTreatment::class);
    }
}
