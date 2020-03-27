<?php

namespace App\Repositories;

interface CriteriaRepositoryInterface
{
    /**
     * Get proposal evaluation.
     *
     * @return object
     */
    public function getCriteria(): object;
}