<?php

namespace Kata\Operations\MovementOperations;

use Kata\Map\Info\Coord;
use Kata\Map\Map;

abstract class MovementOperationVisitor
{
    /**
     * @var Map
     */
    private $map;

    public function __construct(Map $map)
    {
        $this->map = $map;
    }

    public function execute()
    {
        $this->map->moveTo(
            new Coord(
                $this->getAvailableX(
                    $this->getExplorerCoords()->getX() + $this->getXModifier()
                ),
                $this->getAvailableY(
                    $this->getExplorerCoords()->getY() + $this->getYModifier()
                )
            )
        );
    }

    private function getAvailableY(int $y): int
    {
        $availableY = $y;
        if ($y < 0) {
            $availableY = $this->map->getMapInfo()->getMapSize()->getY() - 1;
        } else if($y >= $this->map->getMapInfo()->getMapSize()->getY()) {
            $availableY = 0;
        }

        return $availableY;
    }

    private function getAvailableX(int $x): int
    {
        $availableX = $x;
        if ($x < 0) {
            $availableX = $this->map->getMapInfo()->getMapSize()->getX() - 1;
        } else if($x >= $this->map->getMapInfo()->getMapSize()->getX()) {
            $availableX = 0;
        }

        return $availableX;
    }

    protected function getExplorerCoords()
    {
        return $this->map->getMapInfo()->getExplorerCoords();
    }

    public abstract function getXModifier(): int;

    public abstract function getYModifier(): int;
}
