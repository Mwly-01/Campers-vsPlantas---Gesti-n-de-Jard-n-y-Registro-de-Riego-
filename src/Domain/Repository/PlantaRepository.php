<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Model\Planta\Planta;

interface PlantaRepository
{
    /**
     * @return Planta[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return User
     * @throws UserNotFoundException
     */
    public function findPlantaOfId(int $id): Planta;

    /**
     * @param int $id
     * @return bool
     * @throws UserNotFoundException
     */
    public function deletePlanta(int $id): bool;

    /**
     * @param array $data
     * @return User
     * @throws UserNotFoundException
     */
    public function createPlanta(array $data): Planta;

    /**
     * @param array $data
     * @return bool
     * @throws UserNotFoundException
     */
    public function updatePlanta(int $id, array $data): bool;
}