<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Planta; // CAMBIAR RUTAS

use App\Domain\DomainException\Planta\PlantaAlreadyExistsException;
use App\Domain\DomainException\Planta\PlantaNotFoundException;

use App\Domain\Model\Planta\Planta;
use App\Domain\Repository\PlantaRepository;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class ElloquentPlantaRepository implements PlantaRepository
{
    /**
     * {@inheritdoc}
     */
    public function findAll(): array
    {
        return Planta::all()->toArray();
    }

    /**
     * {@inheritdoc}
     */
    public function findPlantaOfId(int $id): Planta
    {
        try {
            return Planta::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new PlantaNotFoundException();
        }
    }


    /**
     * {@inheritdoc}
     */
    public function deletePlanta(int $id): bool
    {
        $user = $this->findPlantaOfId($id);
        return $user->delete();
    }


    /**
     * {@inheritdoc}
     */
    public function createPlanta(array $data): Planta
    {
        $user = Planta::create($data);
        if (!$user) {
            throw new PlantaAlreadyExistsException();
        }
        return $user;
    }


    /**
     * {@inheritdoc}
     */
    public function updatePlanta(int $id, array $data): bool
    {
        $user = $this->findPlantaOfId($id);
        return $user->update($data);
    }
}
