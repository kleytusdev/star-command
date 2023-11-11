<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * enum EntryGuideStatusEnum
 */
enum EntryGuideStatusEnum: string
{
    case SEALED       = 'Sellado';
    case DEFECTIVE    = 'Defectuoso';
    case REFURBISHED  = 'Reacondicionado';
}
