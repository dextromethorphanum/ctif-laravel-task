<?php

namespace App\Http\Controllers;

use App\Models\IBAN;
use App\Models\EcoCode;
use App\Models\District;
use Illuminate\Http\Request;

class IBANController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ctif', [
            'data_eco_codes' => EcoCode::all(),
            'data_districts' => District::all()
        ]);
        
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IBAN  $iBAN
     * @return \Illuminate\Http\Response
     */
    public function show(IBAN $iBAN)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IBAN  $iBAN
     * @return \Illuminate\Http\Response
     */
    public function edit(IBAN $iBAN)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IBAN  $iBAN
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IBAN $iBAN)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IBAN  $iBAN
     * @return \Illuminate\Http\Response
     */
    public function destroy(IBAN $iBAN)
    {
        //
    }
}
