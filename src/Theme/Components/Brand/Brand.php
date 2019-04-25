<?php
/**
 * Copyright (c) 2018.
 */
/**
 * User: abdullah
 * Date: 26.11.2018
 * Time: 17:16
 */
namespace AppWorkBundle\Theme\Components\Brand;

use AppWorkBundle\ArrayableInterface;
use AppWorkBundle\Html\ImgTag;
use AppWorkBundle\JsonableInterface;
use AppWorkBundle\Theme\ComponentInterface;
use AppWorkBundle\Theme\PropertySets\LinkPropertySet;
use AppWorkBundle\Theme\Theme;

/**
 * Class Brand
 */
class Brand implements ComponentInterface, ArrayableInterface, JsonableInterface
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
     * Brand constructor
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
        $oLogo = new ImgTag(
            $this->oTheme->document,
            NULL,
            NULL,
            NULL,
            NULL,
            NULL,
            NULL,
            NULL,
            '/bundles/appwork/custom/img/moon.png',
            NULL,
            NULL
        );
        $oLink = new LinkPropertySet($this->oTheme);
        $aO = [
            'name' => 'Company',
            'logo' => $oLogo,
            'link' => $oLink
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
            'name',
            'logo',
            'link'
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
        if ($name === 'name') {
            if (!is_string($value)) {
                throw new \UnexpectedValueException("name must be a string");
            }
            $this->aData['name'] = $value;
            return;
        }
        if ($name === 'logo') {
            if (!is_object($value) || !($value instanceof ImgTag)) {
                throw new \UnexpectedValueException(sprintf("logo must be an instance of '%1\$s'", ImgTag::class));
            }
            $this->aData['logo'] = $value;
            return;
        }
        if ($name === 'link') {
            if (!is_object($value) || !($value instanceof LinkPropertySet)) {
                throw new \UnexpectedValueException(sprintf("link must be an instance of '%1\$s'", LinkPropertySet::class));
            }
            $this->aData['link'] = $value;
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
            'name',
            'logo',
            'link'
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