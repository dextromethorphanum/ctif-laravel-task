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
        $user = new User();
        $operator_raion_code = null;

        if(Auth::check())
        {
            $user = $user->find(Auth::id());
            $operator_raion_code = $user->getIdOfDistrictOperator($user->id);
        }

        return view('mf', [
            'operator_raion' => $operator_raion_code,
            'data_eco_codes' => EcoCode::all(),
            'data_districts' => $operator_raion_code ? District::where('code', $operator_raion_code)->get() : District::all(),
            'is_admin' => Auth::check() ? $user->find(Auth::id())->hasRole('admin') : null
        ]);
    }
}
