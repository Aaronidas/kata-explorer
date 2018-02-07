<?php

namespace Kata\Menu;

use Kata\Map\Info\MapSize;
use Kata\Map\Map;
use Kata\Operations\BackwardMapOperation;
use Kata\Operations\ExitOperation;
use Kata\Operations\ForwardOperation;
use Kata\Operations\Operation;
use Kata\Operations\TurnLeftOperation;
use Kata\Operations\TurnRightOperation;
use Kata\Utils\Collection;

class Menu
{
    /** @var Collection|Operation[] */
    private $commands;
    private $map;
    private $closed;

    public function __construct()
    {
        $this->closed = false;

        $this->map = new Map(new MapSize(5,10));

        $this->commands = new Collection();
        $this->commands->add(new TurnLeftOperation($this->map));
        $this->commands->add(new TurnRightOperation($this->map));
        $this->commands->add(new ForwardOperation($this->map));
        $this->commands->add(new BackwardMapOperation($this->map));
        $this->commands->add(new ExitOperation($this));
    }

    public function execute(int $option)
    {
        $this->commands->get($option)->execute();
    }

    public function getArrayOfCommandsTitle()
    {
        $arr = [];
        foreach ($this->commands as $index => $theCommand) {
            $arr[$index+1] = $index+1 . ' ' . $theCommand->getTitle();
        }

        return $arr;
    }

    public function renderMap(): string
    {
        return $this->map->render();
    }

    public function isClosed()
    {
        return true === $this->closed;
    }

    public function close()
    {
        $this->closed = true;
    }
}
