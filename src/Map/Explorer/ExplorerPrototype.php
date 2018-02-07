<?php

namespace Kata\Map\Explorer;

use Kata\Map\Element\ExplorerElement;

class ExplorerPrototype
{
    private $explorer;

    public function __construct()
    {
        $this->explorer = new ExplorerElement();
    }

    public function clone(): ExplorerElement
    {
        return clone $this->explorer;
    }
}
