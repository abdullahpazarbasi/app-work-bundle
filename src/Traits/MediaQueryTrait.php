<?php
/**
 * Copyright (c) 2018.
 */
/**
 * User: abdullah
 * Date: 29.11.2018
 * Time: 17:21
 */
namespace AppWorkBundle\Traits;

use AppWorkBundle\Html\Tag;

/**
 * Trait MediaQueryTrait
 */
trait MediaQueryTrait
{
    
    /**
     * @var array
     */
    protected static $aMediaQueryOperators = [
        Tag::MEDIA_QUERY_OPERATOR_AND,
        Tag::MEDIA_QUERY_OPERATOR_OR,
        Tag::MEDIA_QUERY_OPERATOR_NOT
    ];
    
    /**
     * @var array
     */
    protected static $aMediaQueryDevices = [
        Tag::MEDIA_QUERY_DEVICE_ALL,
        Tag::MEDIA_QUERY_DEVICE_AURAL,
        Tag::MEDIA_QUERY_DEVICE_BRAILLE,
        Tag::MEDIA_QUERY_DEVICE_HANDHELD,
        Tag::MEDIA_QUERY_DEVICE_PRINT,
        Tag::MEDIA_QUERY_DEVICE_PROJECTION,
        Tag::MEDIA_QUERY_DEVICE_SCREEN,
        Tag::MEDIA_QUERY_DEVICE_TTY,
        Tag::MEDIA_QUERY_DEVICE_TV,
    ];
    
    /**
     * @var array
     */
    protected static $aMediaQueryProperties = [
        Tag::MEDIA_QUERY_PROPERTY_WIDTH,
        Tag::MEDIA_QUERY_PROPERTY_MIN_WIDTH,
        Tag::MEDIA_QUERY_PROPERTY_MAX_WIDTH,
        Tag::MEDIA_QUERY_PROPERTY_HEIGHT,
        Tag::MEDIA_QUERY_PROPERTY_MIN_HEIGHT,
        Tag::MEDIA_QUERY_PROPERTY_MAX_HEIGHT,
        Tag::MEDIA_QUERY_PROPERTY_DEVICE_WIDTH,
        Tag::MEDIA_QUERY_PROPERTY_MIN_DEVICE_WIDTH,
        Tag::MEDIA_QUERY_PROPERTY_MAX_DEVICE_WIDTH,
        Tag::MEDIA_QUERY_PROPERTY_DEVICE_HEIGHT,
        Tag::MEDIA_QUERY_PROPERTY_MIN_DEVICE_HEIGHT,
        Tag::MEDIA_QUERY_PROPERTY_MAX_DEVICE_HEIGHT,
        Tag::MEDIA_QUERY_PROPERTY_ORIENTATION,
        Tag::MEDIA_QUERY_PROPERTY_ASPECT_RATIO,
        Tag::MEDIA_QUERY_PROPERTY_MIN_ASPECT_RATIO,
        Tag::MEDIA_QUERY_PROPERTY_MAX_ASPECT_RATIO,
        Tag::MEDIA_QUERY_PROPERTY_DEVICE_ASPECT_RATIO,
        Tag::MEDIA_QUERY_PROPERTY_MIN_DEVICE_ASPECT_RATIO,
        Tag::MEDIA_QUERY_PROPERTY_MAX_DEVICE_ASPECT_RATIO,
        Tag::MEDIA_QUERY_PROPERTY_COLOR,
        Tag::MEDIA_QUERY_PROPERTY_MIN_COLOR,
        Tag::MEDIA_QUERY_PROPERTY_MAX_COLOR,
        Tag::MEDIA_QUERY_PROPERTY_COLOR_INDEX,
        Tag::MEDIA_QUERY_PROPERTY_MIN_COLOR_INDEX,
        Tag::MEDIA_QUERY_PROPERTY_MAX_COLOR_INDEX,
        Tag::MEDIA_QUERY_PROPERTY_MONOCHROME,
        Tag::MEDIA_QUERY_PROPERTY_MIN_MONOCHROME,
        Tag::MEDIA_QUERY_PROPERTY_MAX_MONOCHROME,
        Tag::MEDIA_QUERY_PROPERTY_RESOLUTION,
        Tag::MEDIA_QUERY_PROPERTY_MIN_RESOLUTION,
        Tag::MEDIA_QUERY_PROPERTY_MAX_RESOLUTION,
        Tag::MEDIA_QUERY_PROPERTY_SCAN,
        Tag::MEDIA_QUERY_PROPERTY_GRID
    ];
    
    /**
     * @var array
     */
    protected $aMediaQuery = [];
    
    /**
     * @return array
     */
    public function getMediaQuery(): array
    {
        return $this->aMediaQuery;
    }
    
    /**
     * @return string|null
     */
    public function getMediaQueryAttributeValue(): ?string
    {
        if ($this->hasAttribute('media')) {
            return $this->getAttribute('media');
        }
        return NULL;
    }
    
    /**
     * @return boolean
     */
    public function hasMediaQuery(): bool
    {
        return empty($this->aMediaQuery) ? FALSE : TRUE;
    }
    
    /**
     * @return bool
     */
    public function isMediaQueryIncomplete(): bool
    {
        if (empty($this->aMediaQuery)) {
            return FALSE;
        }
        $sMediaQueryClause = end($this->aMediaQuery);
        if (in_array($sMediaQueryClause, self::$aMediaQueryOperators)) {
            return TRUE;
        }
        return FALSE;
    }
    
    /**
     * @return static
     */
    public function updateMediaQueryAttribute()
    {
        if (empty($this->aMediaQuery)) {
            if ($this->hasAttribute('media')) {
                $this->removeAttribute('media');
            }
            return $this;
        }
        $sAttributeValue = implode(' ', $this->aMediaQuery);
        $this->setAttribute('media', $sAttributeValue);
        return $this;
    }
    
    /**
     * @param $sMediaQueryClause
     * @throws \DOMException
     * @return static
     */
    public function addMediaQueryClause($sMediaQueryClause)
    {
        if (in_array($sMediaQueryClause, self::$aMediaQueryOperators)) {
            if (!$this->hasMediaQuery()) {
                throw new \DOMException("Media query can not begin with an operator");
            }
            if ($this->isMediaQueryIncomplete()) {
                throw new \DOMException("Media query has already been ended with an operator");
            }
        }
        $this->aMediaQuery[] = $sMediaQueryClause;
        $this->updateMediaQueryAttribute();
        return $this;
    }
    
    /**
     * @param $aMediaQuery
     * @throws \DOMException
     * @return static
     */
    public function setMediaQuery($aMediaQuery)
    {
        if (is_array($aMediaQuery)) {
            foreach ($aMediaQuery as $sMediaQueryClause) {
                $this->addMediaQueryClause($sMediaQueryClause);
            }
        }
        return $this;
    }
    
}