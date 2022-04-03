<?php

if(!isset($_POST['apiRequest']) && !isset($_POST['getiban']))
    exit;

use App\Models\IBAN;
use App\Models\Locality;

require __DIR__.'/../../vendor/autoload.php';
$app = require_once __DIR__.'/../../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

if(isset($_POST['getiban']))
{
    $data = json_decode(IBAN::where('eco_code', $_POST['eco'])->where('locality_code', $_POST['loc'])->select('code')->get(), true);
    if(!empty($data))
        echo '<div class="success_iban">Codul IBAN: <div class="success_iban_code">' . $data[0]['code'] . '</div></div>';
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
