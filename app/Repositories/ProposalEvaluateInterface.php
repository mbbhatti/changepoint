<?php

namespace App\Repositories;

interface ProposalEvaluateInterface
{
    /**
     * Manage proposal evaluation by criteria.
     *
     * @param  request  $request
     * @return array
     */
    public function evaluate($request): array;
}