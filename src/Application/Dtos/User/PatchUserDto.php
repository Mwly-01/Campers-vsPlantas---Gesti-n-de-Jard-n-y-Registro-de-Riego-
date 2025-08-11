<?php

declare(strict_types=1);

namespace App\Application\Dtos\User;

use App\Application\Dtos\Contracts\ArraySerializableDto;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as validation;

class PatchUserDto implements ArraySerializableDto
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
            validation::stringType()->length(min: 3, max: 50)->setName('name')->assert($this->args['name']);
            validation::email()->setName('email')->assert($this->args['email']);
            validation::stringType()->length(min: 8, max: 110)
                ->regex('/[!@#$%^&*()\-_=+{};:,<.>]/')->regex('/[0-9]/')
                ->setName('password')->assert($this->args['password']);
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
            'id' => (int)$this->args['id'],
            'name' => htmlspecialchars($this->args['name']),
            'email' => htmlspecialchars($this->args['email']),
            'password' => password_hash($this->args['password'], PASSWORD_DEFAULT)
        ];
    }
}
