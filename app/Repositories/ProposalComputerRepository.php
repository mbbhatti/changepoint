<?php

namespace App\Repositories;

use App\Repositories\CriteriaRepository;

class ProposalComputerRepository implements ProposalEvaluateInterface
{
    /**
     * @var object
     */
    protected $criteria;

    /**
     * Create a new instance.
     *     
     * @param  object $criteria 
     * @return void
     */
    public function __construct(CriteriaRepository $criteria)
    {
        $this->criteria = $criteria;     
    }  

    /**
     * Manage proposal evaluation based on criteria.
     *
     * @param  request  $request     
     * @return array
     */
    public function evaluate($request): array
    {   
        // Get request data
        $data = $this->requestKeyValues($request);      
        
        // Get criteria detail
        $criterion = $this->criteria->getCriteria(); 

        // Process to evaluate criteria score
        $score = 0;
        $product_id = 0;        
        foreach ($criterion as $criteria) {
            if(in_array($criteria->name, $data[0])) {  
                $value = explode('|', $criteria->value);
                foreach ($value as $v) {                    
                    if(in_array($v, $data[1])) {
                        $score = $score + $criteria->score;    
                    }
                }
            }

            $product_id = $criteria->product_id;  
        }        

        return [$score, $product_id];    
    }  

    /**
     * Manage proposal request key and values.
     *
     * @param  request  $request     
     * @return array
     */
    public function requestKeyValues($request): array
    {
        $keys = [];
        $values = [];
        foreach ($request->except('_token') as $key => $part) {
            if($key != 'name' && $key != 'price') {
                $keys[] = $key;
                $values[] = $part;
            }
        }

        return [$keys, $values];
    } 
}