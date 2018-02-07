<?php

namespace Kata\Operations;

class BackwardMapOperation extends MapOperation
{
    public function getTitle(): string
    {
        return 'Retroceder';
    }

    public function execute()
    {
        $this->getExplorer()->getDirection()->executeBackward($this->getMap());
    }
}
