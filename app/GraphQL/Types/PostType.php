<?php

declare(strict_types=1);

namespace App\GraphQL\Type;

use App\Post;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;
use GraphQL;

class PostType extends GraphQLType
{
    protected $attributes = [
        'name' => 'PostType',
        'description' => 'A type',
        'model' => Post::class
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::ID(),
                'description' => 'Id - Post',
            ],
            'title' => [
                'type' => Type::string(),
                'description' => 'Title - Post'
            ],
            'active' => [
                'type' => Type::boolean(),
                'description' => 'Status - Post'
            ],
            'user_id' => [
                'type' => Type::int(),
                'description' => 'User id - Post'
            ]
        ];
    }
}
