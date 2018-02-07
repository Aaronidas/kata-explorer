<?php

namespace Kata\Operations;

use Kata\Map\Map;

abstract class MapOperation implements Operation
{
    /**
     * @var Map
     */
    private $map;

    public function __construct(Map $map)
    {
        $this->map = $map;
    }

    protected function getMap()
    {
        return $this->map;
    }

    protected function getExplorer()
    {
        return $this->getMap()->getMapInfo()->getExplorer();
    }

    public abstract function getTitle(): string;

    public abstract function execute();
}
