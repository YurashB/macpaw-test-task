<?php

namespace App\Services;

use App\Http\Resources\CollectionsResource;
use App\Models\Collections;
use App\Repositories\CollectionsRepositoryInterface;
use Illuminate\Http\Request;

interface CollectionsServiceInterface
{
    public function getAll();
    public function add($collection);
    public function getWithContributors($id);
    public function filterByLeftAmount($leftAmountParameter, $action);


}
