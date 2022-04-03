<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\EcoCode;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index()
    {
        return view('mf', [
            'data_eco_codes' => EcoCode::all(),
            'data_districts' => District::all(),
            'is_admin' => Auth::check() ? (new User)->find(Auth::id())->hasRole('admin') : null
        ]);
    }
}
