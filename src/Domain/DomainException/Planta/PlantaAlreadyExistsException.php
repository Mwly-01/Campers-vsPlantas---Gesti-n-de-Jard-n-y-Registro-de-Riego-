<?php

declare(strict_types=1);

namespace App\Domain\DomainException\Planta;

use App\Domain\DomainException\DomainRecordConflictException;

class PlantaAlreadyExistsException extends DomainRecordConflictException
{
    public $message = 'El nombre de la planta o familia ya se encuentra registrado.';
}
