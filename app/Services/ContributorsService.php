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

    public function find($id)
    {
        $contributor = $this->contributorRepository->find($id);

        if (sizeof($contributor) === 0) {
            throw new EntityNotFoundException('Contributor', $id);
        };

        return $contributor;
    }


    public function addContributorToCollection($contributor)
    {
        $collection = $this->collectionsRepository->find($contributor['collection_id']);

        if (sizeof($collection) === 0) {
            throw new EntityNotFoundException('Collection', $contributor['collection_id']);
        };

        return $this->contributorRepository->add($contributor);
    }

    public function destroy($id)
    {
        return $this->contributorRepository->delete($id);
    }

    // Expect all fields from front-end with olds ones
    public function update($updatedContributor, $id)
    {
        $this->find($id);

        return $this->contributorRepository->update($updatedContributor, $id);
    }


}
