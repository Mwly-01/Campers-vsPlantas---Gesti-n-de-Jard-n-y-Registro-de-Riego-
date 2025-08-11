<?php

namespace App\Application\UseCase\Planta;

use App\Application\Dtos\Contracts\ArraySerializableDto;

use App\Domain\Repository\PlantaRepository;

class GetAllPlantaUseCase
{
    public function __construct(private PlantaRepository $repository) {}

    /**
     * @param ?ArraySerializableDto $dto
     * @return mixed
     */
    // public function __invoke(?ArraySerializableDto $dto = null)
    // {
    //     return $this->repository->findAll($dto->toArray());
    // }

    public function execute(): ?array{

        return $this->repository->findAll();

    }
}
