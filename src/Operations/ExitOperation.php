<?php

namespace Kata\Operations;

use Kata\Menu\Menu;

class ExitOperation implements Operation
{
    /**
     * @var Menu
     */
    private $menu;

    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    public function getTitle(): string
    {
        return 'Salir';
    }

    public function execute()
    {
        $this->menu->close();
    }
}
