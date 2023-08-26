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
            'collection' => (object) [
                'title' => $data[0]->title,
                'description' => $data[0]->description,
                'target_amount' => $data[0]->target_amount,
                'link' => $data[0]->link,
            ],
            'contributors' => []
        ];

        foreach ($data as $item) {
            $contributor = (object) [
                $item->user_name,
                $item->amount
            ];
            $responseData['contributors'][] = $contributor;
        }

        return $responseData;
    }


}
