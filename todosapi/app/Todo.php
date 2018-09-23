<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $guarded = [];
    protected $fields = [
        'content' => [
            'cast' => 'string',  // default, can be omitted
            'maxlength' => 100, 
            'column' => 'content', 
        ],
        'completed' => [
            'cast' => 'boolean',
            'column' => 'completed', 
        ]
        ];
}
