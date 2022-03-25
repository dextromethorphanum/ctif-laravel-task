<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = public_path("stuff/districts.txt", ' - ');
        $districts = $this->txtToArray($file);
        $data = array();

        for ($i = 0; $i != sizeof($districts); $i++)
        {
            $data[] = [
                'code' => $districts[$i]['code'],
                'name' => $districts[$i]['name'],
            ];
        }

        DB::table('districts')->insert($data);
    }
    public function txtToArray($filename = '', $delimiter = ' - ')
    {
        if (!file_exists($filename) || !is_readable($filename))
            return false;
    
        $data = array();
        if (($handle = fopen($filename, 'r')) !== false)
        {
            while (($row = fgets($handle)) !== false)
            {
                $row = trim($row);
                $data[] = array_combine(['code', 'name'], explode($delimiter, $row));
                // dump($data);
            }
            fclose($handle);
        }
    
        return $data;
    }
}
