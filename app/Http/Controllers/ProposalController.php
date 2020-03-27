<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProposalRepository;
use App\Repositories\ProposalDetailRepository;

class ProposalController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Proposal Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for a customer request and
    | Proposal for his product demand and the system will find matching suppliers.
    |
    */

    /**
     * @var object
     */
    protected $proposal;

    /**
     * @var object
     */
    protected $proposalDetail;

    /**
     * Create a new controller instance.
     *     
     * @param  object $proposal 
     * @return void
     */
    public function __construct(
        ProposalRepository $proposal,
        ProposalDetailRepository $proposalDetail
    )
    {
        $this->proposal = $proposal;   
        $this->proposalDetail = $proposalDetail;            
    }    

    /**
     * Get proposal.
     *
     * @return object json
     */
    public function getProposals(): object
    {        
        return response()->json($this->proposal->getProposals());
    }

    /**
     * Add proposal.
     *
     * @param object request
     * @return object json
     */
    public function addProposals(request $request): object
    {        
        // Get proposal id after save the proposal
        $proposal_id = $this->proposal->saveProposal($request);

        // Save the proposal detail
        $response = $this->proposalDetail->saveProposalDetail(
            $request, 
            $proposal_id
        );   

        return response()->json($response);
    }
}
