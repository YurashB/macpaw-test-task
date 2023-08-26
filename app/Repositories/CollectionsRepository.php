<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class CollectionsRepository implements CollectionsRepositoryInterface
{
    public function getAll()
    {
        return DB::select('SELECT * FROM collections');
    }

    public function add($collection)
    {
        $query = "INSERT INTO collections(title, description, target_amount, link)
            VALUES(?, ?, ?, ?)";

        return DB::insert($query, [$collection['title'], $collection['description'], $collection['target_amount'], $collection['link']]);
    }

    public function find($id)
    {
        return DB::select('SELECT * FROM collections WHERE id = ?', [$id]);
    }


}
