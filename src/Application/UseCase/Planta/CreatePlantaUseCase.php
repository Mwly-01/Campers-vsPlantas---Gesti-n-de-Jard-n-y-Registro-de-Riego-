<?php

namespace App\Application\UseCase\Planta;

use App\Application\Dtos\Contracts\ArraySerializableDto;
use App\Domain\Repository\PlantaRepository;

class CreatePlantaUseCase 
{
    public function __construct(private readonly PlantaRepository $repository) {}

    /**
     * @param ?ArraySerializableDto $dto
     * @return mixed
     */
    public function __invoke(?ArraySerializableDto $dto = null)
    {
        return $this->repository->createPlanta($dto->toArray());
    }
}
