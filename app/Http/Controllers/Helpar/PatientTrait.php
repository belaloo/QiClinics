<?php

namespace App\Http\Controllers\Helpar;

use App\Models\MedicalRecord;
use App\Models\PatientMedicalRecord;

trait PatientTrait
{
    public function getPatientMedicalRecords($id)
    {
        $data = array();
        $medical_records = PatientMedicalRecord::wherePatientId($id)->get();
        foreach ($medical_records as $record) {
            $medical_row = MedicalRecord::whereId($record->medical_record_id)->first()->name;
            $record['medical_record_name'] = $medical_row ? $medical_row : "";
            array_push($data, $record);
        }
        return $data;
    }

    public function updatePatientMedicalRecords($medicalRecords, $id)
    {
        PatientMedicalRecord::wherePatientId($id)->delete();
        foreach ($medicalRecords as $record) {
            $medical_record = new PatientMedicalRecord();
            $medical_record->patient_id = $id;
            $medical_record->medical_record_id = $record;
            $medical_record->save();
        }
    }
}
