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

        return json_encode($this->service->addContributorToCollection($validatedCollection) === 1);
    }

    public function destroy(int $id){
        return json_encode($this->service->destroy($id) === 1);
    }

    public function update(ContributorRequest $request, int $id) {
        $validatedCollection = $request->validated();

        return json_encode($this->service->update($validatedCollection, $id) === 1);
    }

}
