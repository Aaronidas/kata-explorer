<?php

namespace Kata\Map\Explorer\Directions;

use Kata\Map\Map;
use Kata\Operations\MovementOperations\Backward\BackwardFromEast;
use Kata\Operations\MovementOperations\Forward\ForwardFromEast;

class East implements ExplorerDirection
{

    public function __toString(): string
    {
        return '►';
    }

    public function directionInLeft(): string
    {
        return DirectionFactory::SOUTH;
    }

    public function directionInRight(): string
    {
        return DirectionFactory::NORTH;
    }

    public function executeForward(Map $map)
    {
        $map->accept(
            new ForwardFromEast($map)
        );
    }

    public function executeBackward(Map $map)
    {
        $map->accept(
            new BackwardFromEast($map)
        );
    }
}
