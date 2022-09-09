<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;

    public static function getByClinicId($clinicId)
    {
        return self::where('clinic_id', $clinicId)->get();
    }
}
