<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * enum CategoryStatusEnum
 */
enum CategoryStatusEnum: string
{
  case ACTIVE       = 'Activo';
  case INACTIVE     = 'Inactivo';
}
