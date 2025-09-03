<?php

namespace App\Enums;

enum ProductStatus: int
{
    case PENDING = 0;
    case ACTIVE = 1;
    case NEW = 2;
    case SALE = 3;
    case SOLD = 4;
}
