<?php

namespace Kata\Operations\MovementOperations\Forward;

use Kata\Operations\MovementOperations\MovementOperationVisitor;

class ForwardFromNorth extends MovementOperationVisitor
{
    public function getXModifier(): int
    {
        return -1;
    }

    public function getYModifier(): int
    {
        return 0;
    }
}
