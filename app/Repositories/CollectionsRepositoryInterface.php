<?php

namespace App\Repositories;

interface CollectionsRepositoryInterface
{
    public function getAll();
    public function add($collection);
    public function find($id);
    public function getWithContributors($id);
    public function getLeftAmountCollections();
    public function delete($id);
    public function update($updatedCollection, $id);
}
