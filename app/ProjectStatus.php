<?php

namespace App;

enum ProjectStatus: string
{
    case Active = 'active';
    case Completed = 'completed';
    case OnHold = 'on-hold';
}
