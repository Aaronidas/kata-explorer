<?php

namespace Kata\Map\Info;

use Kata\Map\Element\ExplorerElement;
use Kata\Map\Map;

class MapInfo
{
    private $map;
    private $mapSize;
    private $explorerCoords;

    /**
     * MapInfo constructor.
     *
     * @param $map
     * @param $mapSize
     * @param $explorerCoords
     */
    public function __construct(Map $map, MapSize $mapSize, Coord $explorerCoords)
    {
        $this->map = $map;
        $this->mapSize = $mapSize;
        $this->explorerCoords = $explorerCoords;
    }

    /**
     * @return Map
     */
    public function getMap(): Map
    {
        return $this->map;
    }

    /**
     * @return MapSize
     */
    public function getMapSize(): MapSize
    {
        return $this->mapSize;
    }

    /**
     * @return Coord
     */
    public function getExplorerCoords(): Coord
    {
        return $this->explorerCoords;
    }

    public function updateExplorerCoords(Coord $coords)
    {
        $this->explorerCoords = $coords;
    }

    public function getExplorer(): ExplorerElement
    {
        return $this->getMap()->getElemFromCoords($this->getExplorerCoords());
    }

    public function canMoveTo(Coord $coords)
    {
        return $this->getMap()->getElemFromCoords($coords);
    }

    public function render(array $map): string
    {
        $return = '';
        $return .= $this->printMapDelimiter();
        for ($x = 0; $x < $this->getMapSize()->getX(); $x++) {
            for ($y = 0; $y < $this->getMapSize()->getY(); $y++) {
                $return .= sprintf($map[$x][$y]);
            }
            $return .= PHP_EOL;
        }
        $return .= $this->printMapDelimiter();

        return $return;
    }

    private function printMapDelimiter(): string
    {
        $return = '';
        for ($i = 0; $i < $this->getMapSize()->getY(); $i++) {
            $return .= '-';
        }

        return $return . PHP_EOL;
    }
}
