<?php

namespace Kata\Operations;

class TurnLeftOperation extends MapOperation
{

    public function getTitle(): string
    {
        return 'Girar 90 grados a la derecha';
    }

    public function execute()
    {
        $this->getMap()->getMapInfo()->getExplorer()->turnLeft();
    }
}
