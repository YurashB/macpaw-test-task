<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class CollectionsRepository implements CollectionsRepositoryInterface
{
    public function getAll()
    {
        return DB::select('SELECT * FROM collections');
    }

}
