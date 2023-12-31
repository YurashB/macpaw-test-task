<?php

namespace App\Services;
interface CollectionsServiceInterface
{
    public function find($id);
    public function getAll();

    public function add($collection);

    public function getWithContributors($id);

    public function filterByLeftAmount($leftAmountParameter, $action);

    public function destroy($id);

    public function update($updatedCollection, $id);

}
