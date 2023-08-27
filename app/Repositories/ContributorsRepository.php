<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class ContributorsRepository implements ContributorsRepositoryInterface
{
    public function add($contributor)
    {
        $query = 'INSERT INTO contributors(user_name, amount, collection_id)
            VALUES(?, ?, ?)';

        return DB::insert($query, [$contributor['user_name'], $contributor['amount'],$contributor['collection_id']]);
    }

    public function delete($id)
    {
        return DB::delete('DELETE FROM contributors WHERE id = ?', [$id]);
    }


}
