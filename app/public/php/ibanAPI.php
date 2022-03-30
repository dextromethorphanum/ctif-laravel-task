<?php

if(!isset($_POST['apiRequest']))
    exit;

use App\Models\Locality;

require __DIR__.'/../../vendor/autoload.php';
$app = require_once __DIR__.'/../../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

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
