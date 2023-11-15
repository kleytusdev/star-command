<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * enum RoleEnum
 */
enum RoleEnum: string
{
    case SELLER          = 'Vendedor';
    case STORER          = 'Almacenista';
    case GENERAL_MANAGER = 'Gerente General';
}
