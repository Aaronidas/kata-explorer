<?php

namespace Kata\Map\Explorer;

use Kata\Map\Explorer\Directions\ExplorerDirection;

interface Explorer
{
    public function turnLeft();

    public function turnRight();

    public function setDirection(ExplorerDirection $direction);

    public function getDirection(): ExplorerDirection;
}
