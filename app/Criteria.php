<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'criterias';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'value', 'score'
    ];
}
