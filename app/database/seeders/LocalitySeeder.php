<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = public_path("stuff/locality.csv");
        $localities = $this->csvToArray($file);
        $data = [];

        for ($i = 0; $i != sizeof($localities); $i++)
        {
            $data[] = [
                'district_code' => $localities[$i]['parent_cdc'] ? $localities[$i]['parent_cdc'] : NULL,
                'code' => $localities[$i]['cdc'],
                'name' => $localities[$i]['name']
            ];
        }

        dump($data);
        DB::table('localities')->insert($data);
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
