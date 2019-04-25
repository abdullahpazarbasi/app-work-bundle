<?php
/**
 * Copyright (c) 2018.
 */
/**
 * User: abdullah
 * Date: 26.11.2018
 * Time: 15:51
 */
namespace AppWorkBundle\Theme\Sections\Sidenav;

use AppWorkBundle\ArrayableInterface;
use AppWorkBundle\JsonableInterface;
use AppWorkBundle\Theme\ComponentCollection;
use AppWorkBundle\Theme\Components\Brand\Brand;
use AppWorkBundle\Theme\Components\Navigations\SidenavMenu\SidenavMenuItem;
use AppWorkBundle\Theme\Components\Navigations\SidenavMenu\SidenavMenuItems;
use AppWorkBundle\Theme\Theme;

/**
 * Class Sidenav
 */
class Sidenav implements ArrayableInterface, JsonableInterface
{
    
    /**
     * @var Theme
     */
    protected $oTheme;
    
    /**
     * @var array
     */
    protected $aData = [];
    
    /**
     * Sidenav constructor
     *
     * @param Theme $oTheme
     * @throws \DOMException
     * @return void
     */
    public function __construct(Theme $oTheme)
    {
        $this->oTheme = $oTheme;
        $this->aData = $this->giveDefault();
    }
    
    /**
     * @throws \DOMException
     * @return array
     */
    public function giveDefault(): array
    {
        $oBrand = new Brand($this->oTheme);
        $oMyItemsItem = new SidenavMenuItem();
        $oDividerItem = new SidenavMenuItem();
        $oDividerItem->type = 'divider';
        $oHeaderItem = new SidenavMenuItem();
        $oHeaderItem->type = 'header';
        $oOtherItem = new SidenavMenuItem();
        $oSidenavMenuItems = new SidenavMenuItems();
        $oSidenavMenuItems[] = $oMyItemsItem;
        $oSidenavMenuItems[] = $oDividerItem;
        $oSidenavMenuItems[] = $oHeaderItem;
        $oSidenavMenuItems[] = $oOtherItem;
        $oNavigationCollection = new ComponentCollection();
        $oNavigationCollection[] = $oSidenavMenuItems;
        $aO = [
            'brand' => $oBrand,
            'navigations' => $oNavigationCollection
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
            'brand',
            'navigations'
        ])) {
            return TRUE;
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
        if ($name === 'brand') {
            if (!is_object($value) || !($value instanceof Brand)) {
                throw new \UnexpectedValueException(sprintf("brand must be an instance of '%1\$s'", Brand::class));
            }
            $this->aData['brand'] = $value;
            return;
        }
        if ($name === 'navigations') {
            if (!is_object($value) || !($value instanceof ComponentCollection)) {
                throw new \UnexpectedValueException(sprintf("navigations must be an instance of '%1\$s'", ComponentCollection::class));
            }
            $this->aData['navigations'] = $value;
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
            'brand',
            'navigations'
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
        if ($name === 'brand') {
            $this->aData['brand'] = NULL;
            return;
        }
        if ($name === 'navigations') {
            $this->aData['navigations'] = NULL;
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