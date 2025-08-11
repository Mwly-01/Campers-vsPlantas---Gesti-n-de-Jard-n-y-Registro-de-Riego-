<?php

declare(strict_types=1);

namespace App\Domain\Model\Planta;

use Illuminate\Database\Eloquent\Model;

class Planta extends Model
{
    protected $table = 'plantas';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['nombre', 'familia', 'categoria'];
}