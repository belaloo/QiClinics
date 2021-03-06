<?php

namespace App\Http\Controllers;

use App\Models\TratedAreas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TratedAreasController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {
            $trated = TratedAreas::where('is_deleted', 0)->get();
            return $this->apiResponse($trated);
        } else return $this->unAuthoriseResponse();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\TratedAreas $tratedAreas
     * @return \Illuminate\Http\Response
     */
    public function show(TratedAreas $tratedAreas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\TratedAreas $tratedAreas
     * @return \Illuminate\Http\Response
     */
    public function edit(TratedAreas $tratedAreas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TratedAreas $tratedAreas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TratedAreas $tratedAreas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\TratedAreas $tratedAreas
     * @return \Illuminate\Http\Response
     */
    public function destroy(TratedAreas $tratedAreas)
    {
        //
    }
}
