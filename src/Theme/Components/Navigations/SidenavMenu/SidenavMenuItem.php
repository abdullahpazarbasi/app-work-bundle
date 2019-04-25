<?php
/**
 * Copyright (c) 2018.
 */
/**
 * User: abdullah
 * Date: 10.12.2018
 * Time: 14:21
 */
namespace AppWorkBundle\Theme\Components\Navigations\SidenavMenu;

use AppWorkBundle\ArrayableInterface;
use AppWorkBundle\JsonableInterface;

/**
 * Class SidenavMenuItem
 *
 * @property string type
 * @property string title
 * @property string href
 * @property string icon
 * @property bool active
 * @property bool open
 * @property SidenavMenuItems|null children
 */
class SidenavMenuItem implements ArrayableInterface, JsonableInterface
{
    
    /**
     * @var array
     */
    protected $aData = [];
    
    /**
     * @return void
     */
    public function __construct()
    {
        $this->aData = $this->giveDefault();
    }
    
    /**
     * @return array
     */
    public function giveDefault(): array
    {
        $aO = [
            'type' => 'link',
            'title' => '[Title]',
            'href' => 'javascript:void(0)',
            'icon' => 'quote',
            'active' => FALSE,
            'open' => FALSE,
            'children' => NULL
        ];
        return $aO;
    }
    
    /**
     * @param string $name
     * @return bool
     */
    public function __isset($name)
    {
        if (in_array($name, [
            'type',
            'title',
            'href',
            'icon',
            'active',
            'open'
        ])) {
            return TRUE;
        }
        if ($name === 'children') {
            return isset($this->aData['children']);
        }
        return FALSE;
    }
    
    /**
     * @param string $name
     * @param mixed $value
     * @throws \InvalidArgumentException
     * @throws \UnexpectedValueException
     * @return void
     */
    public function __set($name, $value)
    {
        if ($name === 'type') {
            if (!is_string($value)) {
                throw new \UnexpectedValueException("type must be a string");
            }
            $this->aData['type'] = $value;
            return;
        }
        if ($name === 'title') {
            if (!is_string($value)) {
                throw new \UnexpectedValueException("title must be a string");
            }
            $this->aData['title'] = $value;
            return;
        }
        if ($name === 'href') {
            if (!is_string($value)) {
                throw new \UnexpectedValueException("href must be a string");
            }
            $this->aData['href'] = $value;
            return;
        }
        if ($name === 'icon') {
            if (!is_string($value)) {
                throw new \UnexpectedValueException("icon must be a string");
            }
            $this->aData['icon'] = $value;
            return;
        }
        if ($name === 'active') {
            if (!is_bool($value)) {
                throw new \UnexpectedValueException("active must be a boolean");
            }
            $this->aData['active'] = $value;
            return;
        }
        if ($name === 'open') {
            if (!is_bool($value)) {
                throw new \UnexpectedValueException("open must be a boolean");
            }
            $this->aData['open'] = $value;
            return;
        }
        if ($name === 'children') {
            if (!is_object($value) || !($value instanceof SidenavMenuItems)) {
                throw new \UnexpectedValueException(sprintf("children must be an instance of '%1\$s'", SidenavMenuItems::class));
            }
            $this->aData['children'] = $value;
            return;
        }
        throw new \InvalidArgumentException(sprintf("%s is not a valid property", $name));
    }
    
    /**
     * @param string $name
     * @throws \InvalidArgumentException
     * @return mixed
     */
    public function __get($name)
    {
        if (in_array($name, [
            'type',
            'title',
            'href',
            'icon',
            'active',
            'open',
            'children'
        ])) {
            return $this->aData[$name];
        }
        throw new \InvalidArgumentException(sprintf("%s is not a valid property", $name));
    }
    
    /**
     * @param string $name
     * @throws \InvalidArgumentException
     * @return void
     */
    public function __unset($name)
    {
        if ($name === 'type') {
            $this->aData['type'] = 'link';
            return;
        }
        if ($name === 'title') {
            $this->aData['title'] = '';
            return;
        }
        if ($name === 'href') {
            $this->aData['href'] = '';
            return;
        }
        if ($name === 'icon') {
            $this->aData['icon'] = '';
            return;
        }
        if ($name === 'active') {
            $this->aData['active'] = FALSE;
            return;
        }
        if ($name === 'open') {
            $this->aData['open'] = FALSE;
            return;
        }
        if ($name === 'children') {
            $this->aData['children'] = NULL;
            return;
        }
        throw new \InvalidArgumentException(sprintf("%s is not a valid property", $name));
    }
    
    /**
     * @return array
     */
    public function toArray(): array
    {
        $aO = [];
        foreach ($this->aData as $sProperty => $xValue) {
            if (is_object($xValue) && $xValue instanceof ArrayableInterface) {
                $aO[$sProperty] = $xValue->toArray();
            }
            else {
                $aO[$sProperty] = $xValue;
            }
        }
        return $aO;
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