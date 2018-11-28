<?php
/**
 * Copyright (c) 2018.
 */
/**
 * User: abdullah
 * Date: 27.11.2018
 * Time: 17:55
 */
namespace AppWorkBundle\Theme\PropertySets;

use AppWorkBundle\ArrayableInterface;
use AppWorkBundle\JsonableInterface;
use AppWorkBundle\Theme\Theme;

/**
 * Class HeaderPropertySet
 */
class HeaderPropertySet implements ArrayableInterface, JsonableInterface
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
        $aO = [
            'title' => 'Layout',
            'ancestry' => 'Layouts'
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
        if ($name === 'title') {
            if (!is_string($value)) {
                throw new \UnexpectedValueException("title must be a string");
            }
            $this->aData['title'] = $value;
            return;
        }
        if ($name === 'ancestry') {
            if (!is_string($value)) {
                throw new \UnexpectedValueException("ancestry must be a string");
            }
            $this->aData['ancestry'] = $value;
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
            'title',
            'ancestry'
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