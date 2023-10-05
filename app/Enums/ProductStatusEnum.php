<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * enum ProductStatusEnum
 */
enum ProductStatusEnum: string
{
  case ACTIVE       = 'Activo';
  case INACTIVE     = 'Inactivo';
}
