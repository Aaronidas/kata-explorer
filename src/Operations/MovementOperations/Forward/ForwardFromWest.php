<?php

namespace Kata\Operations\MovementOperations\Forward;

use Kata\Map\Info\Coord;
use Kata\Operations\MovementOperations\MovementOperationVisitor;

class ForwardFromWest extends MovementOperationVisitor
{

    public function execute()
    {
        $this->getMap()->moveTo(
            new Coord(
                $this->getAvailableX(
                    $this->getExplorerCoords()->getX()
                ),
                $this->getAvailableY(
                    $this->getExplorerCoords()->getY() - 1
                )
            )
        );
    }

    public function getXModifier(): int
    {
        return 0;
    }

    public function getYModifier(): int
    {
        return -1;
    }
}
