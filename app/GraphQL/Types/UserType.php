<?php

declare(strict_types=1);

namespace App\GraphQL\Types;

use App\User;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'User',
        'description' => 'A type of Users',
        'model' => User::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::ID()),
                'description' => 'user id'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'user name in the database'
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'user email in the database'
            ],
            'password' => [
                'type' => Type::string()
            ],
            'posts' => [
                'type' => Type::listOf(GraphQL::type('post_type')),
                'description' => 'Posts Por usuário'
            ]
        ];
    }
}
