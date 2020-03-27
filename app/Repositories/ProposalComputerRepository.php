<?php

namespace App\Repositories;

use App\Criteria;

class ProposalComputerRepository implements ProposalEvaluateInterface
{
    /**
     * @var array
     */
    protected $keys;

    /**
     * Create a new instance.
     *     
     * @return void
     */
    public function __construct()
    {
        $this->keys = [
            'processor', 
            'ram', 
            'resolution', 
            'certificate'
        ];   
    }  

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
        
        // Get product criteria
        $criterion = Criteria::all(); 

        $score = 0;
        $product_id = 0;        
        foreach ($criterion as $criteria) {
            if(in_array($criteria->name, $this->keys)) {  
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
}