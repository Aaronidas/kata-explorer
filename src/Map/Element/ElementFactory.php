<?php

namespace Kata\Map\Element;

use Kata\Map\Explorer\ExplorerPrototype;

class ElementFactory
{
    private static $instance;
    private $elements;

    const ELEMENT_VOID = 'void';
    const ELEMENT_OBSTACLE = 'obstacle';
    const ELEMENT_EXPLORER = 'explorer';

    private function __construct()
    {
        $this->elements = [];
        $this->elements[self::ELEMENT_VOID] = new VoidElement();
        $this->elements[self::ELEMENT_OBSTACLE] = new ObstacleElement();
        $this->elements[self::ELEMENT_EXPLORER] = new ExplorerPrototype();
    }

    public static function instance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getVoidElement(): MapElement
    {
        return $this->elements[self::ELEMENT_VOID];
    }

    public function getObstacleElement(): MapElement
    {
        return $this->elements[self::ELEMENT_OBSTACLE];
    }

    public function getExplorerElement(): MapElement
    {
        /** @var ExplorerPrototype $prototype */
        $prototype = $this->elements[self::ELEMENT_EXPLORER];
        return $prototype->clone();
    }
}
