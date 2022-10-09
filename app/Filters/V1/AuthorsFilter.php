<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class AuthorsFilter extends ApiFilter
{
    protected $safeParams = [
        'name' => ['eq', 'lk'],
        'surname' => ['eq', 'lk'],
    ];

    protected $columnMap = [

        'name' => 'name',
        'surname' => 'surname'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lk' => 'like'
    ];
}
