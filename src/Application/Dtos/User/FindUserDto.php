<?php

declare(strict_types=1);

namespace App\Application\Dtos\User;

use App\Application\Dtos\Contracts\ArraySerializableDto;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as validation;

class FindUserDto implements ArraySerializableDto
{

    /**
     * @param array $args
     */
    public function __construct(private readonly array $args)
    {
        $this->validate();
    }

    /**
     * @throws InvalidArgumentException
     */
    private function validate()
    {
        try {
            validation::intType()->setName('userId')->assert((int)$this->args['id']);
        } catch (NestedValidationException $e) {
            throw new \InvalidArgumentException($e->getFullMessage());
        }
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => (int)$this->args['id']
        ];
    }
}
