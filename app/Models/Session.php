<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = ['id', 'room_number', 'session_date', 'start_time', 'finish_time', 'session_duration', 'notes', 'is_sun_exposure_note', 'sun_exposure_note', 'is_pregnancy',
        'pregnancy', 'is_injection', 'injection', 'is_use_cream', 'use_cream', 'technician_id', 'machine_id', 'patient_id'];
}
