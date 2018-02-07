<?php

namespace Kata\Map\Explorer\Directions;

use Kata\Map\Map;
use Kata\Operations\MovementOperations\Backward\BackwardFromSouth;
use Kata\Operations\MovementOperations\Forward\ForwardFromSouth;

class South implements ExplorerDirection
{
    public function __toString(): string
    {
        return '▼';
    }

    public function directionInLeft(): string
    {
        return DirectionFactory::WEST;
    }

    public function directionInRight(): string
    {
        return DirectionFactory::EAST;
    }

    public function executeForward(Map $map)
    {
        $map->accept(
            new ForwardFromSouth($map)
        );
    }

    public function executeBackward(Map $map)
    {
        $map->accept(
            new BackwardFromSouth($map)
        );
    }
}
