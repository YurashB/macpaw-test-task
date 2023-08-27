<?php

namespace App\Services;

use App\Http\Resources\CollectionsResource;
use App\Models\Collections;
use App\Repositories\CollectionsRepository;
use App\Repositories\CollectionsRepositoryInterface;
use Faker\Provider\Person;
use Illuminate\Contracts\Queue\EntityNotFoundException;
use Illuminate\Http\Request;

class CollectionsService implements CollectionsServiceInterface
{

    private CollectionsRepositoryInterface $repository;

    public function __construct(CollectionsRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function find($id)
    {
        $data = $this->repository->find($id);

        if (sizeof($data) === 0) {
            throw new EntityNotFoundException('Collection', $id);
        };
    }


    public function getAll()
    {
        return $this->repository->getAll();
    }

    public function add($collection)
    {
        return $this->repository->add($collection);
    }

    public function getWithContributors($id)
    {
        $data = $this->repository->getWithContributors($id);

        if (sizeof($data) === 0) {
            throw new EntityNotFoundException('Collection', $id);
        };

        $responseData = [
            'collection' => (object)[
                'title' => $data[0]->title,
                'description' => $data[0]->description,
                'target_amount' => $data[0]->target_amount,
                'link' => $data[0]->link,
            ],
            'contributors' => []
        ];

        foreach ($data as $item) {
            $contributor = (object)[
                $item->user_name,
                $item->amount
            ];
            $responseData['contributors'][] = $contributor;
        }

        return $responseData;
    }


    /*
     * Service for filtering collections. If var $leftAmountParameter is used than
     * we filter collections where left amount less than $leftAmountParameter by default;
     * If $action is 'bigger-than' than we filter collections where left amount is bigger than
     * $leftAmountParameter.
     * If $leftAmountParameter not entered we return all collections where sum off all amounts that
     * users add less than target amount;
     */
    public function filterByLeftAmount($leftAmountParameter, $action = "less-than")
    {
        $collections = collect($this->repository->getLeftAmountCollections());

        if ($leftAmountParameter) {
            if ($action === "bigger-than") {
                $collections = $collections->filter(function ($value) use ($leftAmountParameter) {
                    return $value->left_amount > $leftAmountParameter;
                });
            } else {
                $collections = $collections->filter(function ($collection) use ($leftAmountParameter) {
                    return $collection->left_amount < $leftAmountParameter;
                });
            }
        }
        return $collections->values();
    }

    public function destroy($id)
    {
        return $this->repository->delete($id);
    }

    // Expect all fields from front-end with olds ones
    public function update($updatedCollection, $id)
    {
        $this->find($id);

        return $this->repository->update($updatedCollection, $id);
    }


}
