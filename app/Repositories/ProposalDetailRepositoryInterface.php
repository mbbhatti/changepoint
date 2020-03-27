<?php

namespace App\Repositories;

interface ProposalDetailRepositoryInterface
{
    /**
     * Save proposal detail.
     *
     * @param  request  $request
     * @param  int      $proposal_id 
     * @return bool
     */
    public function saveProposalDetail($request, $proposal_id): bool;
}