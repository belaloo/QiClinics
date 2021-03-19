<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pageSize)
    {
        if (Auth::user()) {
            $sessions = Session::paginate($pageSize);
            $colliction = $sessions->getCollection();
            return $this->apiResponse($colliction);
        } else
            return $this->unAuthoriseResponse();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $required = ['room_number', 'session_date', 'start_time', 'finish_time', 'session_duration', 'notes', 'is_sun_exposure_note', 'sun_exposure_note', 'is_pregnancy',
            'pregnancy', 'is_injection', 'injection', 'is_use_cream', 'use_cream', 'technician_id', 'machine_id', 'patient_id'];

        $validate = $this->apiValidation($request, $required);
        if ($validate[0] == 'true') {
            if (Auth::user()) {
                $patient = Patient::where('id', $request->patient_id)->first();
                if ($patient) {
                    $session = new Session;
                    $session->room_number = $request->room_number;
                    $session->session_date = $request->session_date;
                    $session->start_time = $request->start_time;
                    $session->finish_time = $request->finish_time;
                    $session->session_duration = $request->session_duration;
                    $session->notes = $request->notes;
                    $session->is_sun_exposure_note = $request->is_sun_exposure_note;
                    $session->sun_exposure_note = $request->sun_exposure_note;
                    $session->is_pregnancy = $request->is_pregnancy;
                    $session->pregnancy = $request->pregnancy;
                    $session->is_injection = $request->is_injection;
                    $session->injection = $request->injection;
                    $session->is_use_cream = $request->is_use_cream;
                    $session->use_cream = $request->use_cream;
                    $session->technician_id = $request->technician_id;
                    $session->machine_id = $request->machine_id;
                    $session->patient_id = $request->patient_id;
                    $session->save();
                    return $this->apiResponse($session);
                } else return $this->notFoundMassage('patient');
            } else return $this->unAuthoriseResponse();
        } else return $this->requiredField($validate[1]);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Session $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Session $session
     * @return \Illuminate\Http\Response
     */
    public function edit(Session $session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Session $session
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Session $session)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Session $session
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
        //
    }
}
