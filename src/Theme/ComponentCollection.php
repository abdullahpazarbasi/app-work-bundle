<?php
/**
 * Copyright (c) 2018.
 */
/**
 * User: abdullah
 * Date: 23.11.2018
 * Time: 12:42
 */
namespace AppWorkBundle\Theme;

use AppWorkBundle\ArrayableInterface;
use AppWorkBundle\JsonableInterface;

/**
 * Class ComponentCollection
 *
 * foreach loop:
 * 1. Before the first iteration of the loop, Iterator::rewind() is called.
 * 2. Before each iteration of the loop, Iterator::valid() is called.
 * 3a. It Iterator::valid() returns false, the loop is terminated.
 * 3b. If Iterator::valid() returns true, Iterator::current() and Iterator::key() are called.
 * 4. The loop body is evaluated.
 * 5. After each iteration of the loop, Iterator::next() is called and we repeat from step 2 above.
 */
class ComponentCollection implements \ArrayAccess, \Iterator, \Countable, ArrayableInterface, JsonableInterface
{
    
    const BEFORE = 1;
    const AFTER = 2;
    
    /**
     * @var array
     */
    protected static $aInsertModes = [
        self::BEFORE,
        self::AFTER
    ];
    
    /**
     * @var array
     */
    protected $aCollection = [];
    
    /**
     * Return the current element
     *
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type
     */
    public function current()
    {
        return current($this->aCollection);
    }
    
    /**
     * Move forward to next element
     *
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored
     */
    public function next()
    {
        next($this->aCollection);
    }
    
    /**
     * Return the key of the current element
     *
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure
     */
    public function key()
    {
        return key($this->aCollection);
    }
    
    /**
     * Checks if current position is valid
     *
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated. Returns true on success or false
     * on failure
     */
    public function valid()
    {
        return key($this->aCollection) !== NULL;
    }
    
    /**
     * Rewind the Iterator to the first element
     *
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored
     */
    public function rewind()
    {
        reset($this->aCollection);
    }
    
    /**
     * Whether a offset exists
     *
     * @link http://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $offset An offset to check for
     * @return boolean true on success or false on failure.
     * The return value will be casted to boolean if non-boolean was returned
     */
    public function offsetExists($offset)
    {
        return isset($this->aCollection[$offset]);
    }
    
    /**
     * Offset to retrieve
     *
     * @link http://php.net/manual/en/arrayaccess.offsetget.php
     * @param mixed $offset The offset to retrieve
     * @return mixed Can return all value types
     */
    public function offsetGet($offset)
    {
        return isset($this->aCollection[$offset]) ? $this->aCollection[$offset] : NULL;
    }
    
    /**
     * Offset to set
     *
     * @link http://php.net/manual/en/arrayaccess.offsetset.php
     * @param mixed $offset The offset to assign the value to
     * @param mixed $value The value to set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (!is_object($value)) {
            throw new \InvalidArgumentException(sprintf(
                "Value must be an object, but '%s' given",
                gettype($value)
            ));
        }
        if (!($value instanceof ComponentInterface)) {
            throw new \InvalidArgumentException(sprintf(
                "Value must be an instance of ComponentInterface, but '%s' instance given",
                get_class($value)
            ));
        }
        if ($offset === NULL) {
            $this->aCollection[] = $value;
        }
        else {
            $this->aCollection[$offset] = $value;
        }
    }
    
    /**
     * Offset to unset
     *
     * @link http://php.net/manual/en/arrayaccess.offsetunset.php
     * @param mixed $offset The offset to unset
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->aCollection[$offset]);
    }
    
    /**
     * Count elements of an object
     *
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer. The return value is cast to an integer
     */
    public function count()
    {
        return count($this->aCollection);
    }
    
    /**
     * @param int $offset
     * @param ComponentInterface $oComponent
     * @param int $iInsertMode
     * @throws \InvalidArgumentException
     * @return static
     */
    public function insert(int $offset, ComponentInterface $oComponent, int $iInsertMode = self::BEFORE)
    {
        if (!in_array($iInsertMode, self::$aInsertModes)) {
            throw new \InvalidArgumentException("Invalid insert mode");
        }
        $iCount = count($this->aCollection);
        if ($iCount === 0) {
            $this->aCollection[] = $oComponent;
            return $this;
        }
        $offset = min(max(0, $offset), $iCount - 1);
        if ($offset === 0 && $iInsertMode === self::BEFORE) {
            array_unshift($this->aCollection, $oComponent);
            return $this;
        }
        if ($offset === ($iCount - 1) && $iInsertMode === self::AFTER) {
            $this->aCollection[] = $oComponent;
            return $this;
        }
        $iPosition = ($iInsertMode === self::AFTER) ? ($offset + 1) : $offset;
        if ($iPosition === $iCount) {
            $this->aCollection[] = $oComponent;
            return $this;
        }
        $this->aCollection = array_merge(
            array_slice($this->aCollection, 0, $iPosition, FALSE),
            [$oComponent],
            array_slice($this->aCollection, $iPosition, $iCount - 1, FALSE)
        );
        return $this;
    }
    
    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->aCollection;
    }
    
    /**
     * @param bool $bPrettify
     * @return string
     */
    public function toJson(bool $bPrettify = FALSE): string
    {
        return json_encode($this->toArray(), $bPrettify ? JSON_PRETTY_PRINT : 0);
    }
    
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toJson(TRUE);
    }
    
}