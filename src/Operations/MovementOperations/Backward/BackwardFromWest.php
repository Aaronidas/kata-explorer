<?php

namespace Kata\Operations\MovementOperations\Backward;

use Kata\Operations\MovementOperations\MovementOperationVisitor;

class BackwardFromWest extends MovementOperationVisitor
{
    public function getXModifier(): int
    {
        return 0;
    }

    public function getYModifier(): int
    {
        return +1;
    }
}
