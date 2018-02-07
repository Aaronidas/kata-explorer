<?php

namespace Kata\Map\Element;

class ObstacleElement implements MapElement
{
    public function __toString()
    {
        return self::OBSTACLE_STRING;
    }

    public function canMoveExplorerToThis(): bool
    {
        return false;
    }
}
