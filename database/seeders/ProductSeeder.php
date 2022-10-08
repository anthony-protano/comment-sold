<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Services\ReadLargeCSV;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = database_path('seeders/csv_data/products.csv');
        $reader = new ReadLargeCSV($file, ',');

        foreach($reader->csvToArray() as $data) {
            foreach ($data as $key => $entry) {
                $data[$key]['user_id'] = $entry['admin_id'];

                unset($data[$key]['admin_id']);
            }

            Product::insert($data);
        }
    }
}
