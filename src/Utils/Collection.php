<?php

namespace Kata\Utils;

class Collection implements \Iterator, \Countable
{
    private $items;
    private $current;

    /**
     * Constructor de la clase
     */
    public function __construct()
    {
        $this->reset();
    }

    /**
     * Resetea la coleccion
     * @return void
     */
    private function reset()
    {
        $this->items = [];
        $this->rewind();
    }

    /**
     * Añade un elemento al primer lugar de la colección
     *
     * @param mixed $value Valor
     *
     * @return void
     */
    public function unshift($value)
    {
        array_unshift($this->items, $value);
        $this->rewind();
    }

    /**
     * Añade un elemento a la colección
     *
     * @param mixed $value Valor
     *
     * @return void
     */
    public function add($value)
    {
        $this->items[] = $value;
        $this->rewind();
    }

    /**
     * Añade un elemento a la colección si no existe previamente
     *
     * @param mixed $value Valor
     *
     * @return void
     */
    public function addOnly($value)
    {
        if ($this->indexOf($value) === false) {
            $this->items[] = $value;
        }
        $this->rewind();
    }

    /**
     * Añade un array
     *
     * @param array   $arr  Array
     * @param boolean $only Añade unico
     *
     * @return void
     */
    public function addArray($arr, $only = false)
    {
        foreach ($arr as $item) {
            if ($only) {
                $this->addOnly($item);
            } else {
                $this->add($item);
            }
        }
    }

    /**
     * Establece la colección de items
     *
     * @param array $arr Colección de items
     *
     * @return void
     */
    public function set(array $arr)
    {
        $this->items = $arr;
        $this->rewind();
    }

    /**
     * Recupera el valor de una key, o el valor por defecto si la key no existe.
     *
     * @param integer $index   Posición
     * @param mixed   $default Valor por defecto
     *
     * @return mixed
     */
    public function get($index, $default = null)
    {
        $index = (int) $index;
        if ($index < 0 && $this->count() >= abs($index)) {
            $index += $this->count();
        }
        if (array_key_exists($index, $this->items)) {
            return $this->items[$index];
        } else {
            return $default;
        }
    }

    /**
     * Devuelve el array de items.
     * @return array
     */
    public function getArray()
    {
        return $this->items;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     */
    public function current()
    {
        return $this->items[$this->current];
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        $this->current++;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        return $this->current;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    public function valid()
    {
        return array_key_exists($this->current, $this->items);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        $this->current = 0;
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Count elements of an object
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     */
    public function count()
    {
        return count($this->items);
    }

    /**
     * Comprueba si la colección está vacía
     * @return boolean
     */
    public function isEmpty()
    {
        return empty($this->items);
    }

    /**
     * Vacia la coleccion
     * @return void
     */
    public function clear()
    {
        $this->reset();
    }

    /**
     * Busca la primera posición de un elemento en la colección
     *
     * @param mixed $searchedValue Valor a buscar
     *
     * @return integer|false
     */
    public function indexOf($searchedValue)
    {
        foreach ($this->items as $key => $value) {
            if ($value === $searchedValue) {
                return $key;
            }
        }

        return false;
    }

    /**
     * busca las posiciones de un elemento en la colección
     *
     * @param mixed $searchedValue Valor a buscar
     *
     * @return array|false
     */
    public function indexesOf($searchedValue)
    {
        $keys = [];
        foreach ($this->items as $key => $value) {
            if ($value === $searchedValue) {
                $keys[] = $key;
            }
        }

        return empty($keys) ? false : $keys;
    }

    /**
     * Elimina todas las posiciones del array con el valor indicado
     *
     * @param mixed $valueToRemove Valor a remover
     *
     * @return void
     */
    public function remove($valueToRemove)
    {
        $deleteKeys = $this->indexesOf($valueToRemove);
        for ($i = count($deleteKeys) - 1; $i >= 0; $i--) {
            $this->removeByIndex($deleteKeys[$i]);
        }
    }

    public function removeByIndex($index)
    {
        if (is_integer($index) && array_key_exists($index, $this->items)) {
            array_splice($this->items, $index, 1);
        }
    }
}
