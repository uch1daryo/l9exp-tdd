<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Report;
use Illuminate\Database\Seeder;

class TestDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::factory(2)->create()->each(function ($customer) {
            Report::factory(2)->make()->each(function ($report) use ($customer) {
                $customer->reports()->save($report);
            });
        });
    }
}
