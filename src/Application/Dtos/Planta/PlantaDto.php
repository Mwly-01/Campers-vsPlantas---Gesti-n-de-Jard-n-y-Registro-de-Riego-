<?php

declare(strict_types=1);

namespace App\Application\Dtos\Planta;

use App\Application\Dtos\Contracts\ArraySerializableDto;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator as v;

class PlantaDto implements ArraySerializableDto
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
            v::stringType()->length(min: 2, max: 50)->setName('nombre')->assert($this->args['nombre']);
            v::stringType()->length(min: 2, max: 50)->setName('familia')->assert($this->args['familia']);
            v::stringType()->length(min: 2, max: 50)->setName('categoria')->assert($this->args['categoria']);
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
            'nombre' => htmlspecialchars($this->args['nombre']),
            'familia' => htmlspecialchars($this->args['familia']),
            'categoria' => htmlspecialchars($this->args['categoria']),
        ];
    }
}