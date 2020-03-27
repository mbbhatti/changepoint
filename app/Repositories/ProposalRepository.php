<?php

namespace App\Repositories;

use App\Proposal;
use App\ProposalDetail;
use App\Repositories\ProposalComputerRepository;

class ProposalRepository implements ProposalRepositoryInterface
{
    /**
     * @var object
     */
    protected $proposalComputer;

    /**
     * Create a new instance.
     *     
     * @param  object $proposalComputer 
     * @return void
     */
    public function __construct(
        ProposalComputerRepository $proposalComputer
    )
    {
        $this->proposalComputer = $proposalComputer;   
    }  

    /**
     * Save proposal.
     *
     * @param  request  $request
     * @return int
     */
    public function saveProposal($request): int
    {
        // Evaluation proposal score
        $data = $this->proposalComputer->evaluate($request);

        $proposal = new Proposal;        
        $proposal->company_model = $request->name;
        $proposal->score = $data[0];
        $proposal->price = $request->price;
        $proposal->product_id = $data[1];

        // Save proposal
        $proposal->save();

        // Return proposal id
        return $proposal->id;
    }   

    /**
     * Get proposal data.
     *
     * @return object
     */
    public function getProposals(): object
    {
        return ProposalDetail::selectRaw(
                    'CONCAT(
                        proposals.company_model, ", ", 
                        GROUP_CONCAT(proposal_details.value SEPARATOR ", "), ", ", 
                        CONCAT(proposals.price, " €")
                    ) AS proposal'
                )                
                ->join('proposals', 'proposals.id', '=', 'proposal_details.proposal_id')                
                ->groupBy('proposal_details.proposal_id')
                ->orderBy('proposals.score', 'DESC')
                ->get();
    } 
}