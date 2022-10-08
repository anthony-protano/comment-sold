<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Services\ReadLargeCSV;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = database_path('seeders/csv_data/orders.csv');
        $reader = new ReadLargeCSV($file, ',');

        foreach($reader->csvToArray() as $data) {
            foreach($data as $key => $entry) {
                if (mb_strtolower($entry['ship_charged_cents']) === 'null') {
                    $data[$key]['ship_charged_cents'] = null;
                }

                if (mb_strtolower($entry['ship_cost_cents']) === 'null') {
                    $data[$key]['ship_cost_cents'] = null;
                }
            }
            Order::insert($data);
        }
    }
}
