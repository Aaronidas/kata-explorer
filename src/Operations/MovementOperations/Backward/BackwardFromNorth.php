<?php

namespace Kata\Operations\MovementOperations\Backward;

use Kata\Operations\MovementOperations\MovementOperationVisitor;

class BackwardFromNorth extends MovementOperationVisitor
{
    public function getXModifier(): int
    {
        return + 1;
    }

    public function getYModifier(): int
    {
        return 0;
    }
}
