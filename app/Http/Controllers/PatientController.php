<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpar\PatientTrait;
use App\Models\Patient;
use App\Models\PatientMedicalRecord;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PatientController extends Controller
{
    use ApiResponseTrait, PatientTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pageSize)
    {
        if (Auth::user()) {
            $patient = Patient::paginate($pageSize);
            $colliction = $patient->getCollection();
            return $this->apiResponse($colliction);
        } else
            return $this->unAuthoriseResponse();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->apiValidation($request, ['name', 'age', 'mobile', 'gender', 'medical_records']);
        if ($validate[0] == 'true') {
            if (Auth::user()) {
                $patient = new Patient;
                $patient->name = $request->name;
                $patient->age = $request->age;
                $patient->mobile = $request->mobile;
                $patient->gender = $request->gender;
                $patient->save();

                foreach ($request->medical_records as $record) {
                    $medical_record = new PatientMedicalRecord();
                    $medical_record->patient_id = $patient->id;
                    $medical_record->medical_record_id = $record;
                    $medical_record->save();
                }
                return $this->apiResponse($patient);
            } else return $this->unAuthoriseResponse();
        } else return $this->requiredField($validate[1]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Patient $patient
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::user()) {
            $patient = Patient::whereId(1)->first();
            if ($patient) {
                $patient['medical_records'] = $this->getPatientMedicalRecords($id);
                return $this->apiResponse([$patient]);
            } else return $this->notFoundMassage('patient');
        } else return $this->unAuthoriseResponse();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Patient $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validate = $this->apiValidation($request, ['id', 'name', 'age', 'mobile', 'gender']);

        if ($validate[0] == 'true') {
            if (Auth::user()) {
                $patient = Patient::where('id', $request->id)->first();
                if ($patient) {
                    $patient->name = $request->name;
                    $patient->age = $request->age;
                    $patient->mobile = $request->mobile;
                    $patient->gender = $request->gender;
                    $patient->save();
                    $this->updatePatientMedicalRecords($request->medical_records, $patient->id);
                    return $this->apiResponse($patient);
                } else return $this->notFoundMassage('Patient');
            } else return $this->unAuthoriseResponse();
        } else return $this->requiredField($validate[1]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Patient $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $validate = $this->apiValidation($request, ['id']);
        if ($validate[0] == 'true') {
            if (Auth::user()) {
                $patient = Patient::where('id', $request->id)->first();
                if ($patient) {
                    $session = Session::wherePatientId($request->id)->first();
                    if (!$session) $patient->delete();
                    else return $this->apiResponse(null, 0, "We can't delete a patient if he\she has sessions");
                    return $this->apiResponse(true);
                } else return $this->notFoundMassage('Patient');
            } else return $this->unAuthoriseResponse();
        } else return $this->requiredField($validate[1]);
    }


}
