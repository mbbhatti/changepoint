<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Criteria;

class CriteriaRepository implements CriteriaRepositoryInterface
{   
    /**
     * Get criteria.
     *
     * @return object
     */
    public function getCriteria(): object
    {
        return Criteria::all();
    } 
}