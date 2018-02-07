<?php

namespace Kata\Map\Explorer\Directions;

use Kata\Map\Map;
use Kata\Operations\MovementOperations\Backward\BackwardFromWest;
use Kata\Operations\MovementOperations\Forward\ForwardFromWest;

class West implements ExplorerDirection
{

    public function __toString(): string
    {
        return '◄';
    }

    public function directionInLeft(): string
    {
        return DirectionFactory::NORTH;
    }

    public function directionInRight(): string
    {
        return DirectionFactory::SOUTH;
    }

    public function executeForward(Map $map)
    {
        $map->accept(
            new ForwardFromWest($map)
        );
    }

    public function executeBackward(Map $map)
    {
        $map->accept(
            new BackwardFromWest($map)
        );
    }
}
