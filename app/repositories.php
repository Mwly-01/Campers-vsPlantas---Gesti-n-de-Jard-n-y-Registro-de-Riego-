<?php

declare(strict_types=1);

use App\Domain\Repository\PlantaRepository;
use App\Domain\Repository\UserRepository;
use App\Infrastructure\Persistence\User\ElloquentUserRepository;
use App\Infrastructure\Persistence\Planta\ElloquentPlantaRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        UserRepository::class => \DI\autowire(ElloquentUserRepository::class),
        PlantaRepository::class => \DI\autowire(ElloquentPlantaRepository::class),
    ]);
};
