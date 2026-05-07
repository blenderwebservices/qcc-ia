<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    protected $guarded = [];

    protected $casts = [
        'answers' => 'array',
        'trainings' => 'array',
        'certifiable' => 'boolean',
    ];
}
