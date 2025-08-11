<?php

declare(strict_types=1);

namespace App\Application\Dtos\User;

use App\Application\Dtos\Contracts\ArraySerializableDto;

class FilterUserDto implements ArraySerializableDto
{
    
    private const ALLOWED_KEYS = [
        'name',
        'email',
    ];

    /**
     * @param array $args
     */
    public function __construct(private readonly array $args) {}

    /**
     * @return array
     */
    public function toArray(): array
    {
        $allowedKeys = array_flip(self::ALLOWED_KEYS);
        return array_map(function ($item) {
            return htmlspecialchars($item);
        }, array_intersect_key($this->args, $allowedKeys));
    }
}
