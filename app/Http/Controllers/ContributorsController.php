<?php

namespace App\Http\Controllers;

use App\Http\Requests\CollectionRequest;
use App\Http\Requests\ContributorRequest;
use App\Services\ContributorsServiceInterface;


class  ContributorsController extends Controller
{

    private ContributorsServiceInterface $service;

    public function __construct(ContributorsServiceInterface $service)
    {
        $this->service = $service;
    }


    public function store(ContributorRequest $request)
    {
        $validatedCollection = $request->validated();

        return $this->service->addContributorToCollection($validatedCollection);
    }

    public function destroy(int $id){
        return $this->service->destroy($id);
    }

    public function update(ContributorRequest $request, int $id) {
        $validatedCollection = $request->validated();

        return $this->service->update($validatedCollection, $id);
    }

}
