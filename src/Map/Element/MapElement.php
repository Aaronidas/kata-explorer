<?php

namespace Kata\Map\Element;

interface MapElement
{
    const OBSTACLE_STRING = 'X';
    const VOID_STRING = 'O';

    public function __toString();

    public function canMoveExplorerToThis(): bool;
}
