<?php

namespace App\GraphQL\Query;

use App\User;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;


class UserPaginateQuery extends Query
{
    protected $attributes = [
        'name' => 'userPaginate',
        'description' => 'A paging query'
    ];

    public function type(): Type
    {
        return GraphQL::paginate('user_type');
    }

    public function args(): array
    {
        return [
            'page' => [
                'type' => type::int(),
                'description' => 'Page set for consultation'
            ],
            'paginate' => [
                'type' => type::int(),
                'description' => 'Number of records per query'
            ]
        ];
    }

    public function resolve($root, $args, SelectFields $fields, ResolveInfo $info)
    {
        // $select = $fields->getSelect();
        // $with = $fields->getRelations();
        $paginate = 10;

        if(isset($args['paginate'])){
            $paginate = $args['paginate'];
        }

        $page = 1;

        if(isset($args['page'])){
            $page = $args['page'];
        }

        return User::paginate($paginate, ['*'], 'page', $page);

    }
}
