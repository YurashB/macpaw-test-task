<?php

namespace App\Services;

interface ContributorsServiceInterface
{

    public function find($id);
    public function addContributorToCollection($contributor);
    public function destroy($id);
    public function update($updatedContributor, $id);

}
