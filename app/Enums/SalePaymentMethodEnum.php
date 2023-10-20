<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * enum SalePaymentMethodEnum
 */
enum SalePaymentMethodEnum: string
{
    case DEBIT             = 'Débito';
    case CREDIT            = 'Crédito';
    case CASH              = 'Efectivo';
    case ELECTRONIC_WALLET = 'Billetera Electrónica';
    case WIRE_TRANSFER     = 'Transferencia Bancaria';
}
