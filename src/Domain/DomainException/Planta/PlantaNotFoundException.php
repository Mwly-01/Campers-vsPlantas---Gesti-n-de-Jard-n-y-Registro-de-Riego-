<?php

declare(strict_types=1);

namespace App\Domain\DomainException\Planta;

use App\Domain\DomainException\DomainRecordNotFoundException;

class PlantaNotFoundException extends DomainRecordNotFoundException
{
    public $message = 'La planta que esta buscando no existe.';
}
