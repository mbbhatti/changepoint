<?php

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider
{

    public function register()
    {        
        $this->app->bind(
            'App\Repositories\ProposalRepositoryInterface',
            'App\Repositories\ProposalRepository',
            'App\Repositories\CriteriaRepositoryInterface',
            'App\Repositories\CriteriaRepository',
            'App\Repositories\ProposalDetailRepositoryInterface',
            'App\Repositories\ProposalDetailRepository',
            'App\Repositories\ProposalEvaluateInterface',
            'App\Repositories\ProposalComputerRepository'
        );
    }
}