<?php
/**
 * Copyright (c) 2018.
 */
/**
 * User: abdullah
 * Date: 26.11.2018
 * Time: 15:51
 */
namespace AppWorkBundle\Theme\Sections\Navbar;

use AppWorkBundle\ArrayableInterface;
use AppWorkBundle\JsonableInterface;
use AppWorkBundle\Theme\ComponentCollection;
use AppWorkBundle\Theme\Components\Brand\Brand;
use AppWorkBundle\Theme\Components\Profile\Profile;
use AppWorkBundle\Theme\PropertySets\SearchbarPropertySet;
use AppWorkBundle\Theme\Theme;

/**
 * Class Navbar
 */
class Navbar implements ArrayableInterface, JsonableInterface
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
     * Navbar constructor
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
        $oProfile = new Profile($this->oTheme);
        $oSearchbar = new SearchbarPropertySet($this->oTheme);
        $oNavigationCollection = new ComponentCollection();
        $aO = [
            'brand' => $oBrand,
            'profile' => $oProfile,
            'searchbar' => $oSearchbar,
            'navigations' => $oNavigationCollection
        ];
        return $aO;
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
        if ($name === 'profile') {
            if (!is_object($value) || !($value instanceof Profile)) {
                throw new \UnexpectedValueException(sprintf("profile must be an instance of '%1\$s'", Profile::class));
            }
            $this->aData['profile'] = $value;
            return;
        }
        if ($name === 'searchbar') {
            if (!is_object($value) || !($value instanceof SearchbarPropertySet)) {
                throw new \UnexpectedValueException(sprintf("searchbar must be an instance of '%1\$s'", SearchbarPropertySet::class));
            }
            $this->aData['searchbar'] = $value;
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
            'profile',
            'searchbar',
            'navigations'
        ])) {
            return $this->aData[$name];
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