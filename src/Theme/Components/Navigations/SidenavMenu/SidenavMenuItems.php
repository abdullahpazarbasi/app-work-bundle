<?php
/**
 * Copyright (c) 2018.
 */
/**
 * User: abdullah
 * Date: 10.12.2018
 * Time: 14:09
 */
namespace AppWorkBundle\Theme\Components\Navigations\SidenavMenu;

use AppWorkBundle\ArrayableInterface;
use AppWorkBundle\JsonableInterface;
use AppWorkBundle\Theme\ComponentInterface;

/**
 * Class SidenavMenuItems
 */
class SidenavMenuItems implements ComponentInterface, \ArrayAccess, \Iterator, \Countable, ArrayableInterface, JsonableInterface
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
    protected $aItems = [];
    
    /**
     * Return the current element
     *
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type
     */
    public function current()
    {
        return current($this->aItems);
    }
    
    /**
     * Move forward to next element
     *
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored
     */
    public function next()
    {
        next($this->aItems);
    }
    
    /**
     * Return the key of the current element
     *
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure
     */
    public function key()
    {
        return key($this->aItems);
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
        return key($this->aItems) !== NULL;
    }
    
    /**
     * Rewind the Iterator to the first element
     *
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored
     */
    public function rewind()
    {
        reset($this->aItems);
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
        return isset($this->aItems[$offset]);
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
        return isset($this->aItems[$offset]) ? $this->aItems[$offset] : NULL;
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
        if (!($value instanceof SidenavMenuItem)) {
            throw new \InvalidArgumentException(sprintf(
                "Value must be an instance of SidenavMenuItem, but '%s' instance given",
                get_class($value)
            ));
        }
        if ($offset === NULL) {
            $this->aItems[] = $value;
        }
        else {
            $this->aItems[$offset] = $value;
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
        unset($this->aItems[$offset]);
    }
    
    /**
     * Count elements of an object
     *
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer. The return value is cast to an integer
     */
    public function count()
    {
        return count($this->aItems);
    }
    
    /**
     * @param int $offset
     * @param SidenavMenuItem $oItem
     * @param int $iInsertMode
     * @throws \InvalidArgumentException
     * @return static
     */
    public function insert(int $offset, SidenavMenuItem $oItem, int $iInsertMode = self::BEFORE)
    {
        if (!in_array($iInsertMode, self::$aInsertModes)) {
            throw new \InvalidArgumentException("Invalid insert mode");
        }
        $iCount = count($this->aItems);
        if ($iCount === 0) {
            $this->aItems[] = $oItem;
            return $this;
        }
        $offset = min(max(0, $offset), $iCount - 1);
        if ($offset === 0 && $iInsertMode === self::BEFORE) {
            array_unshift($this->aItems, $oItem);
            return $this;
        }
        if ($offset === ($iCount - 1) && $iInsertMode === self::AFTER) {
            $this->aItems[] = $oItem;
            return $this;
        }
        $iPosition = ($iInsertMode === self::AFTER) ? ($offset + 1) : $offset;
        if ($iPosition === $iCount) {
            $this->aItems[] = $oItem;
            return $this;
        }
        $this->aItems = array_merge(
            array_slice($this->aItems, 0, $iPosition, FALSE),
            [$oItem],
            array_slice($this->aItems, $iPosition, $iCount - 1, FALSE)
        );
        return $this;
    }
    
    /**
     * @return array
     */
    public function toArray(): array
    {
        return $this->aItems;
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