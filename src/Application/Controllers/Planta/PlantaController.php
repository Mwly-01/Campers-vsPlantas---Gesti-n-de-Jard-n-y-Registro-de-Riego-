<?php

declare(strict_types=1);

namespace App\Application\Controllers\Planta;

use App\Application\Dtos\Planta\PlantaDto;
use App\Application\Dtos\Planta\FilterPlantaDto;
use App\Domain\Repository\PlantaRepository;
use App\Application\UseCase\Planta\GetAllPlantaUseCase;

use App\Application\Dtos\User\FindUserDto;
use App\Application\Dtos\User\PatchUserDto;
use App\Application\Http\Traits\ApiResponseTrait;
use App\Application\UseCase\Planta\CreatePlantaUseCase;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class PlantaController
{
    use ApiResponseTrait;

    public function __construct(private readonly PlantaRepository $plantaRepository) {}

    /**
     * @return mixed
     */
    public function index(Request $request, Response $response)
    {

        $useCase = new GetAllPlantaUseCase($this->plantaRepository);
        return $this->successResponse($response, $useCase->execute());
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return mixed
     */
    public function findById(Request $request, Response $response, array $args)
    {
        $dto = new FindUserDto($args);
        $useCase = new GetAllPlantaUseCase($this->plantaRepository);
        return $this->successResponse($response, $useCase->execute());
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return mixed
     */
    public function create(Request $request, Response $response)
    {
        $dto = new PlantaDto($request->getParsedBody());
        $useCase = new CreatePlantaUseCase($this->plantaRepository);
        return $this->successResponse($response, $useCase($dto));
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return mixed
     */
    public function update(Request $request, Response $response, array $args)
    {
        $dto = new PatchUserDto(array_merge($request->getParsedBody(), $args));
        $useCase = new GetAllPlantaUseCase($this->plantaRepository);
        return $this->successResponse($response, $useCase->execute());
    }

    /**
     * @param Request $request
     * @param Response $response
     * @return mixed
     */
    public function delete(Request $request, Response $response, array $args)
    {
        $dto = new FindUserDto($args);
        $useCase = new GetAllPlantaUseCase($this->plantaRepository);
        return $this->successResponse($response, $useCase->execute());
    }
}
