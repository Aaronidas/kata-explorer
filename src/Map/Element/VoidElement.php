<?php

namespace Kata\Map\Element;

class VoidElement implements MapElement
{
    public function __toString()
    {
        return self::VOID_STRING;
    }

    public function canMoveExplorerToThis(): bool
    {
        return true;
    }
}
