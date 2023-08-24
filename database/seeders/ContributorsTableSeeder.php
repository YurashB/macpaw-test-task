<?php

namespace Database\Seeders;

use App\Models\Contributors;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContributorsTableSeeder extends Seeder
{
    /**
     * Run the Contributors table seeds.
     */
    public function run(): void
    {
        $contributors = Contributors::factory(100)->create();

        foreach ($contributors as $contributor) {
            $query = 'INSERT INTO Contributors(collection_id, user_name, amount)
                    values ($contributor->collection_id, $contributor->user_name, $contributor->amount)';

            // Task require to use native sql but not php methods
            DB::query($query);
        }
    }
}
