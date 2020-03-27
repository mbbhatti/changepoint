<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\ProposalDetail;

class ProposalDetailRepository implements ProposalDetailRepositoryInterface
{
    /**
     * Save proposal detail.
     *
     * @param  request  $request
     * @param  int      $proposal_id 
     * @return bool
     */
    public function saveProposalDetail($request, $proposal_id): bool
    {
        $data = [];
        foreach ($request->except('_token') as $key => $part) {
            if($key != 'name' && $key != 'price') {
                $data[] = [
                    'name' => $key, 
                    'value' => $part,
                    'proposal_id' => $proposal_id
                ];      
            }
        }

        return ProposalDetail::insert($data); 
    }   
}