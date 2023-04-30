<?php

namespace App\Models;

enum LevelState
{

    case ACCEPTED;

    case REJECTED;

    case SECRETLY_ACCEPTED;

    case SECRETLY_REJECTED;

    case LOCKED;

    case UNLOCKED;

}
