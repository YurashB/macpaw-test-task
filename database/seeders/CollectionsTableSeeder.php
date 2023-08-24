<?php

namespace Database\Seeders;

use App\Models\Collections;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollectionsTableSeeder extends Seeder
{
    /**
     * Run the Collections table seeds.
     */
    public function run(): void
    {
        $collections = Collections::factory(100)->create();

        foreach ($collections as $collection) {
            $query = 'INSERT INTO collections(title, description, target_amount, link)
                    values($collection->title, $collection->description, $collection->target_amount, $collection->link)';

            // Task require to use native sql but not php methods
            DB::query($query);
        }

    }
}
