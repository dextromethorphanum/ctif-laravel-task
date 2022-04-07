<?php

namespace App\Http\Controllers;

use App\Models\IBAN;
use App\Models\Locality;

class APIController extends Controller
{
    public function main()
    {
        if(!(request()->post('apiRequest')) && !(request()->post('getiban')))
            exit;

        if(isset($_POST['getiban']))
        {
            $data = IBAN::where('eco_code', $_POST['eco'])->where('locality_code', $_POST['loc'])->select('code')->first();
            if(!empty($data))
                echo '<div class="success_iban">Codul IBAN: <div class="success_iban_code">' . $data['code'] . '</div></div>';
            else echo '<div class="error_iban">Codul IBAN nu exista pentru datele care au fost selectate!</div>';
            exit;
        }

        $data = Locality::where('district_code', $_POST['raion'])->select('code', 'name')->get();
        $response = array();

        foreach($data as $locality)
        {
            $response[] = array(
                "id" => $locality['code'],
                "text" => $locality['code'] . ' — ' . $locality['name']
            );
        }

        echo json_encode($response);

        return;
    }
}
