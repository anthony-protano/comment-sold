<?php

namespace Database\Seeders;

use App\Models\User;
use App\Services\ReadLargeCSV;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = database_path('seeders/csv_data/users.csv');
        $reader = new ReadLargeCSV($file, ',');

        foreach($reader->csvToArray() as $data) {
            foreach ($data as $key => $entry) {
                $data[$key]['password'] = Hash::make('password');
                $data[$key]['profile_photo_path'] = 'https://placebear.com/75/75';

                unset($data[$key]['password_hash'], $data[$key]['password_plain']);
            }

            User::insert($data);
        }
    }
}
