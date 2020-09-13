<?php

//declare(strict_types=1);

namespace App\GraphQL\Queries;

use Closure;

use App\User;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;

use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\SelectFields;



class UserQuery extends Query
{
    protected $attributes = [
        'name' => 'user',
        'description' => 'A query of users'
    ];

    public function type(): Type
    {
        return Type::listOf(GraphQL::type('user_type'));
    }

    public function args(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'Id do user'
            ]
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        /** @var SelectFields $fields */
        // $fields = $getSelectFields();
        // $select = $fields->getSelect();
        // $with = $fields->getRelations();

        if (isset($args['id'])) {
            return User::where('id', $args['id'])->get();
        }

        return User::all();
    }
}
