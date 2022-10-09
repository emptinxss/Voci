<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class PostsFilter extends ApiFilter
{
    protected $safeParams = [
        'post_name' => ['eq', 'lk'],
        'author_id' => ['eq'],
        'media_id' => ['eq'],
    ];

    protected $columnMap = [
        'post_name' => 'post_name',
        'author_id' => 'author_id',
        'media_id' => 'media_id'
    ];

    //change from here if u want to use camelCase in the search

    protected $operatorMap = [
        'eq' => '=',
        'lk' => 'like'
    ];
}
