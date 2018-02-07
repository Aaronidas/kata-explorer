<?php

namespace Kata\Map\Element;

use Kata\Map\Explorer\Directions\DirectionFactory;
use Kata\Map\Explorer\Directions\East;
use Kata\Map\Explorer\Directions\ExplorerDirection;
use Kata\Map\Explorer\Explorer;

class ExplorerElement implements MapElement, Explorer
{
    private $direction;

    public function __construct()
    {
        $this->direction = new East();
    }

    public function __toString()
    {
        return $this->direction->__toString();
    }

    public function turnLeft()
    {
        $this->setDirection(
            DirectionFactory::instance()
                ->getDirection(
                    $this->direction->directionInLeft()
                )
        );
    }

    public function turnRight()
    {
        $this->setDirection(
            DirectionFactory::instance()
                ->getDirection(
                    $this->direction->directionInRight()
                )
        );
    }

    public function setDirection(ExplorerDirection $direction)
    {
        $this->direction = $direction;
    }

    public function getDirection(): ExplorerDirection
    {
        return $this->direction;
    }

    public function canMoveExplorerToThis(): bool
    {
        return false;
    }
}
