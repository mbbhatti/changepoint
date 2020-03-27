<?php

namespace App\Repositories;

use App\Criteria;

class ProposalComputerRepository implements ProposalEvaluateInterface
{
    /**
     * Manage proposal evaluation based on criteria.
     *
     * @param  request  $request     
     * @return array
     */
    public function evaluate($request): array
    {        
        // Get the request data
        $processor = $request->processor;
        $resolution = $request->resolution;
        $ram = $request->ram;
        $certificate = $request->certificate;
        
        // Get request key names
        $keys = $this->requestKeys($request);

        // Get product criteria
        $criterion = Criteria::all(); 

        $score = 0;
        $product_id = 0;        
        foreach ($criterion as $criteria) {
            if(in_array($criteria->name, $keys)) {  
                $value = explode('|', $criteria->value);
                foreach ($value as $v) {                    
                    if(in_array($v, 
                        [
                            $processor, 
                            $resolution, 
                            $ram, 
                            $certificate
                        ]
                        )
                    ) {
                        $score = $score + $criteria->score;    
                    }
                }
            }

            $product_id = $criteria->product_id;  
        }        

        return [$score, $product_id];    
    }  

    /**
     * Manage proposal request value names.
     *
     * @param  request  $request     
     * @return array
     */
    public function requestKeys($request): array
    {
        $keys = [];
        foreach ($request->except('_token') as $key => $part) {
            if($key != 'name' && $key != 'price') {
                $keys[] = $key;
            }
        }

        return $keys;
    } 
}