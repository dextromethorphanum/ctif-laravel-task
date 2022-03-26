<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EcoCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = public_path("stuff/eco_codes.csv");
        $ecos = $this->csvToArray($file);
        $data = [];

        for ($i = 0; $i != sizeof($ecos); $i++)
        {
            # trim string (varchar = 255).
            $ecos[$i]['label'] = substr($ecos[$i]['label'], 0, 255);
            $data[] = [
                'code' => $ecos[$i]['code'],
                'label' => $ecos[$i]['label'],
            ];
        }

        // dump($data);
        DB::table('eco_codes')->insert($data);
    }
    public function csvToArray($filename = '', $delimiter = ',')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;
    
        $header = null;
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
            {
                if (!$header)
                    $header = $row;
                else
                    $data[] = array_combine($header, $row);
            }
            fclose($handle);
        }
    
        return $data;
    }
}
