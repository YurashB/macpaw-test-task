<?php

namespace App\Services;

use App\Repositories\CollectionsRepository;
use App\Repositories\CollectionsRepositoryInterface;
use App\Repositories\ContributorsRepositoryInterface;
use Illuminate\Contracts\Queue\EntityNotFoundException;
use Illuminate\Http\Response;

class ContributorsService implements ContributorsServiceInterface
{

    private ContributorsRepositoryInterface $contributorRepository;
    private CollectionsRepositoryInterface $collectionsRepository;

    public function __construct(ContributorsRepositoryInterface $contributorRepository, CollectionsRepositoryInterface $collectionsRepository)
    {
        $this->contributorRepository = $contributorRepository;
        $this->collectionsRepository = $collectionsRepository;
    }


    public function addContributorToCollection($contributor)
    {
        $collection = $this->collectionsRepository->find($contributor['collection_id']);

        if (sizeof($collection) === 0) {
            throw new EntityNotFoundException('Collection', $contributor['collection_id']);
        };

        return $this->contributorRepository->add($contributor);
    }


}
