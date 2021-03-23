<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientMedicalRecord extends Model
{
    protected $fillable = ["id", "patient_id", "medical_record_id", "updated_at", "created_at"];
}
