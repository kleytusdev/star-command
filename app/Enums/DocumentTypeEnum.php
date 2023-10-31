<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * enum DocumentTypeEnum
 */
enum DocumentTypeEnum: string
{
  case DNI            = 'DNI';
  case CARD_FOREIGNER = 'CARNET EXT.';
}
