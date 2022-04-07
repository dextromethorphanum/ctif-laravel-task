<?php

namespace App\Http\Controllers;

use App\Models\EcoCode;
use App\Models\IBAN;
use App\Models\Locality;
use App\Rules\UpperCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class IBANController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.ibans-management', [
            'ibans' => IBAN::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ibans.create', [
            'ibans' => IBAN::all(),
            'localities' => Locality::all(),
            'eco_codes' => EcoCode::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($this->validateCode($request))
            return redirect()->back()->withErrors(['This IBAN Code already existed.']);

        IBAN::create($request->except(['_token']));
        return redirect()->route('admin.ibans-management')->with('message-success', "You are successful created an IBAN code '{$request->code}'.");
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
    public function edit($iban_id)
    {
        return view('admin.ibans.edit', [
            'iban' => IBAN::find($iban_id),
            'localities' => Locality::all(),
            'eco_codes' => EcoCode::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IBAN  $iBAN
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $iban_id)
    {
        $iban = IBAN::findOrFail($iban_id);
        if($this->validateCode($request))
            return redirect()->back()->withErrors(['This IBAN Code already existed.']);

        $iban->update($request->except(['_token', '_method']));

        return redirect()->route('admin.ibans-management')->with('message-success', "You are successful updated an IBAN code '{$request->code}'.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IBAN  $iBAN
     * @return \Illuminate\Http\Response
     */
    public function destroy($iban_id)
    {
        IBAN::destroy($iban_id);
        return redirect()->route('admin.ibans-management')->with('message-success', "You are successful deleted an IBAN code (id: {$iban_id}).");
    }

    public function validateCode($request, $input_name = 'code')
    {
        # validator (check IBAN Code rules).
        $request->validate([
            // обязательное поле, строка, длина = 24, uppercase, начинается с 'MD', уникальный.
            $input_name => ['required', 'string', 'size:24', new UpperCase, 'starts_with:MD'],
        ]);

        # check if last 14 symbols of IBAN Code is unique in DB.
        $unique_code = substr($request->code, -14);
        $ret = DB::table('iban_codes')
            ->where('code', 'LIKE', '%' . $unique_code)
            ->first();

        # additional check for @update.
        if($ret !== null)
            if(Str::endsWith(Route::currentRouteAction(), '@update') && $request->code == $ret->code)
                return false;

        return $ret;
    }
}
