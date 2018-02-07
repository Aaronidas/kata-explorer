<?php

namespace Kata\Map\Explorer\Directions;

use Kata\Map\Map;
use Kata\Operations\MovementOperations\Backward\BackwardFromNorth;
use Kata\Operations\MovementOperations\Forward\ForwardFromNorth;

class North implements ExplorerDirection
{

    public function __toString(): string
    {
        return '▲';
    }

    public function directionInLeft(): string
    {
        return DirectionFactory::EAST;
    }

    public function directionInRight(): string
    {
        return DirectionFactory::WEST;
    }

    public function executeForward(Map $map)
    {
        $map->accept(
            new ForwardFromNorth($map)
        );
    }

    public function executeBackward(Map $map)
    {
        $map->accept(
            new BackwardFromNorth($map)
        );
    }
}
