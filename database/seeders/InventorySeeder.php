<?php

namespace Database\Seeders;

use App\Models\Inventory;
use App\Services\ReadLargeCSV;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = database_path('seeders/csv_data/inventory.csv');
        $reader = new ReadLargeCSV($file, ',');

        foreach($reader->csvToArray() as $data) {
            Inventory::insert($data);
        }
    }
}
