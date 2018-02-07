<?php

namespace Kata\Map\Explorer\Directions;

class DirectionFactory
{
    private static $instance;
    private $directions;

    const NORTH = 'north';
    const SOUTH = 'south';
    const EAST = 'east';
    const WEST = 'west';

    private function __construct()
    {
        $this->directions = [];
        $this->directions[self::NORTH] = new North();
        $this->directions[self::SOUTH] = new South();
        $this->directions[self::EAST] = new East();
        $this->directions[self::WEST] = new West();
    }

    public static function instance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getDirection(string $direction): ExplorerDirection
    {
        if (false === array_key_exists($direction, $this->directions)){
            throw new \Exception('Direction ' . $direction. ' not found');
        }

        return $this->directions[$direction];
    }
}
