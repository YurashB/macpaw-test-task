<?php

namespace App\Http\Controllers;

use App\Http\Requests\CollectionRequest;
use App\Http\Resources\CollectionsResource;
use App\Models\Collections;
use App\Repositories\CollectionsRepositoryInterface;
use App\Services\CollectionsService;
use App\Services\CollectionsServiceInterface;
use http\Exception\InvalidArgumentException;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class CollectionsController extends Controller
{

    private CollectionsServiceInterface $service;

    public function __construct(CollectionsServiceInterface $service)
    {
        $this->service = $service;
    }

    /**
     * Display a listing of the collections.
     */
    public function index()
    {
        $data = $this->service->getAll();
        return CollectionsResource::collection($data);
    }

    public function store(CollectionRequest $request)
    {
        ;
        $validatedCollection = $request->validated();

        return $this->service->add($validatedCollection);
    }

    public function show(int $id)
    {

        return json_encode($this->service->getWithContributors($id));
    }

    public function filterByLeftAmount(Request $request)
    {
        $leftAmountParameter = $request->query->get('left-amount');
        $action = $request->query->get('action');
        return json_encode($this->service->filterByLeftAmount($leftAmountParameter, $action));
    }

    public function destroy(int $id)
    {
        return json_encode($this->service->destroy($id));
    }

    public function update(CollectionRequest $request, int $id)
    {
        $validatedCollection = $request->validated();

        return json_encode($this->service->update($validatedCollection, $id));
    }

}
