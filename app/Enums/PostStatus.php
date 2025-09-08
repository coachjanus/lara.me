<?php

namespace App\Enums;

enum PostStatus: int
{
    case PENDING = 0;
    case ACTIVE = 1;
    case NEW = 2;

}
