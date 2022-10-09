<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class MediaFilter extends ApiFilter
{
    protected $safeParams = [
        'name' => ['eq', 'lk'],
        'category' => ['eq', 'lk'],
        'description' => ['eq', 'lk'],
        'file' => ['eq', 'lk'],
    ];

    protected $columnMap = [
        'name' => 'name',
        'category' => 'category',
        'description' => 'description'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lk' => 'like'
    ];
}
