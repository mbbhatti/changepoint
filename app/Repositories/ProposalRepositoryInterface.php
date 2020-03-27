<?php

namespace App\Repositories;

interface ProposalRepositoryInterface
{
    /**
     * Save proposal.
     *
     * @param  request  $request
     * @return int
     */
    public function saveProposal($request): int;

    /**
     * Get proposals.
     *
     * @param  request  $request
     * @return object
     */
    public function getProposals(): object;
}