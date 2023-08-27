<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\select;

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

    public function getWithContributors($id)
    {
        $query = 'SELECT col.title, col.description, col.target_amount, col.link, con.user_name, con.amount, con.id
            FROM collections col
            JOIN contributors con on col.id = con.collection_id
            where col.id = ?;';

        return DB::select($query, [$id]);
    }

    /*
     * Return collections where summary of all amount
     * of specific collection is less than target amount
     * of this collection with left amount field and order
     * by left amount
     */

    public function getLeftAmountCollections()
    {
        $query = 'SELECT SUM(con.amount) AS sum_amount,
       col.id,
       col.target_amount,
       (col.target_amount - SUM(con.amount)) AS left_amount
        FROM collections col
        JOIN contributors con ON col.id = con.collection_id
        GROUP BY (con.collection_id)
        HAVING sum_amount < col.target_amount
        ORDER BY left_amount';

        return DB::select($query);

    }

    // Contributors also deletes cause set delete cascade
    public function delete($id)
    {
        return DB::delete('DELETE FROM collections WHERE id = ?', [$id]);
    }


}
