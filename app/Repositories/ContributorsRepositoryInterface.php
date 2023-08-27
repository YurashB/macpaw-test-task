<?php

namespace App\Repositories;

interface ContributorsRepositoryInterface
{
    public function find($id);
    public function add($contributor);
    public function delete($id);
    public function update($updatedContributor, $id);

}
