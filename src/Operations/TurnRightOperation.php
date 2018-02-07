<?php

namespace Kata\Operations;

class TurnRightOperation extends MapOperation
{
    public function getTitle(): string
    {
        return 'Girar 90 grados a la izquierda';
    }

    public function execute()
    {
        $this->getMap()->getMapInfo()->getExplorer()->turnRight();
    }
}
