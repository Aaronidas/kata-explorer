<?php

namespace Kata\Operations\MovementOperations\Forward;

use Kata\Operations\MovementOperations\MovementOperationVisitor;

class ForwardFromEast extends MovementOperationVisitor
{
    public function getXModifier(): int
    {
        return 0;
    }

    public function getYModifier(): int
    {
        return + 1;
    }
}
