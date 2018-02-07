<?php

namespace Kata\Map;

use Kata\Map\Element\ElementFactory;
use Kata\Map\Element\MapElement;
use Kata\Map\Info\Coord;
use Kata\Map\Info\MapInfo;
use Kata\Map\Info\MapSize;
use Kata\Operations\MovementOperations\MovementOperationVisitor;

class Map
{
    private $map;
    private $mapInfo;

    public function __construct(MapSize $mapSize)
    {
        $this->map = [];
        $explorerCoords = new Coord(2,2);
        for ($x = 0; $x < $mapSize->getX(); $x++) {
            for ($y = 0; $y < $mapSize->getY(); $y++) {
                $this->map[$x][$y] = ElementFactory::instance()->getVoidElement();
                if ($x == $explorerCoords->getX() && $y == $explorerCoords->getY()) {
                    $this->map[$x][$y] = ElementFactory::instance()->getExplorerElement();
                    $explorerCoords = new Coord($x, $y);
                }
            }
        }
        $this->mapInfo = new MapInfo($this, $mapSize, $explorerCoords);
    }

    public function accept(MovementOperationVisitor $operation)
    {
        $operation->execute();
    }

    public function moveTo(Coord $coords)
    {
        if (false === $this->getMapInfo()->canMoveTo($coords)) {
            throw new \Exception('Cant move to ' . sprintf($coords));
        }

        $desireedX = $coords->getX();
        $desireedY = $coords->getY();
        $currentExporerX = $this->getMapInfo()->getExplorerCoords()->getX();
        $currentExporerY = $this->getMapInfo()->getExplorerCoords()->getY();
        $explorer = $this->getMapInfo()->getExplorer();
        $this->map[$currentExporerX][$currentExporerY] = ElementFactory::instance()->getVoidElement();
        $this->map[$desireedX][$desireedY] = $explorer;
        $this->getMapInfo()->updateExplorerCoords(new Coord($desireedX, $desireedY));
    }

    public function getMapInfo(): MapInfo
    {
        return $this->mapInfo;
    }

    public function getElemFromCoords(Coord $coords): MapElement
    {
        $x = $coords->getX();
        $y = $coords->getY();

        return $this->map[$x][$y];
    }

    public function render()
    {
        return $this->getMapInfo()->render($this->map);
    }
}
