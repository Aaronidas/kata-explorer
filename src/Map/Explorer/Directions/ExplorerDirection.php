<?php

namespace Kata\Map\Explorer\Directions;

use Kata\Map\Map;

interface ExplorerDirection
{
    public function __toString(): string;

    public function directionInLeft(): string;

    public function directionInRight(): string;

    public function executeForward(Map $map);

    public function executeBackward(Map $map);
}
