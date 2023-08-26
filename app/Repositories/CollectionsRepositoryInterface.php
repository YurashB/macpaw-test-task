<?php

namespace App\Repositories;

interface CollectionsRepositoryInterface
{
    public function getAll();
    public function add($collection);
    public function find($id);

    public function getWithContributors($id);
}
