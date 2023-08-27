<?php

namespace App\Repositories;

interface ContributorsRepositoryInterface
{
    public function add($contributor);
    public function delete($id);

}
