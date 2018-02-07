<?php

namespace Kata\Operations;

class ForwardOperation extends MapOperation
{

    public function getTitle(): string
    {
        return 'Avanzar';
    }

    public function execute()
    {
        $this->getExplorer()->getDirection()->executeForward($this->getMap());
    }
}
