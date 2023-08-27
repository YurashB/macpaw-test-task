<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCollectionRequest;
use App\Http\Requests\StoreContributorRequest;
use App\Services\ContributorsServiceInterface;


class  ContributorsController extends Controller
{

    private ContributorsServiceInterface $service;

    public function __construct(ContributorsServiceInterface $service)
    {
        $this->service = $service;
    }


    public function store(StoreContributorRequest $request)
    {
        $validatedCollection = $request->validated();

        return $this->service->addContributorToCollection($validatedCollection);
    }

    public function destroy(int $id){
        return $this->service->destroy($id);
    }

}
