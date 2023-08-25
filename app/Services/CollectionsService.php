<?php

namespace App\Services;

use App\Http\Resources\CollectionsResource;
use App\Models\Collections;
use App\Repositories\CollectionsRepository;
use App\Repositories\CollectionsRepositoryInterface;
use Illuminate\Http\Request;

class CollectionsService implements CollectionsServiceInterface
{

    private CollectionsRepositoryInterface $repository;

    public function __construct(CollectionsRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAll()
    {
        return $this->repository->getAll();
    }


}
