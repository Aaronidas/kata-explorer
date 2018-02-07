<?php

namespace Kata\Map\Info;

class Coord
{
    private $x;
    private $y;

    /**
     * MapSize constructor.
     *
     * @param int $x
     * @param int $y
     */
    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @param int $x
     * @param int $y
     *
     * @return void
     */
    public function updateCoords($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @return int
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY()
    {
        return $this->y;
    }

    public function __toString()
    {
        return 'x: ' . $this->getX() . ' y: ' . $this->getY();
    }
}
