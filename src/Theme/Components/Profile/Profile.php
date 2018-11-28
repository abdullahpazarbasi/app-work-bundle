<?php
/**
 * Copyright (c) 2018.
 */
/**
 * User: abdullah
 * Date: 26.11.2018
 * Time: 17:16
 */
namespace AppWorkBundle\Theme\Components\Profile;

use AppWorkBundle\ArrayableInterface;
use AppWorkBundle\Html\ImgTag;
use AppWorkBundle\JsonableInterface;
use AppWorkBundle\Theme\PropertySets\ImagePropertySet;
use AppWorkBundle\Theme\Theme;

/**
 * Class Profile
 */
class Profile implements ArrayableInterface, JsonableInterface
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
     * Profile constructor
     *
     * @param Theme $oTheme
     * @return void
     */
    public function __construct(Theme $oTheme)
    {
        $this->oTheme = $oTheme;
        $this->aData = $this->giveDefault();
    }
    
    /**
     * @return array
     */
    public function giveDefault(): array
    {
        $oPicture = new ImagePropertySet($this->oTheme);
        $oPicture->src = '/bundles/appwork/custom/img/no-one.jpg';
        $aO = [
            'name' => 'John Doe',
            'picture' => $oPicture,
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
            'picture'
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
        if ($name === 'picture') {
            if (!is_object($value) || !($value instanceof ImgTag)) {
                throw new \UnexpectedValueException(sprintf("picture must be an instance of '%1\$s'", ImgTag::class));
            }
            $this->aData['picture'] = $value;
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
            'picture'
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