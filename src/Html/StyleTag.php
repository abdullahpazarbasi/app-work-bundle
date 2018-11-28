<?php
/**
 * Copyright (c) 2018.
 */
/**
 * User: abdullah
 * Date: 22.11.2018
 * Time: 16:43
 */
namespace AppWorkBundle\Html;

use AppWorkBundle\Theme\ComponentInterface;

/**
 * Class StyleTag
 */
class StyleTag extends Tag implements ComponentInterface
{
    
    const MEDIA_TYPE_CSS = 'text/css';
    const MEDIA_QUERY_OPERATOR_AND = 'and';
    const MEDIA_QUERY_OPERATOR_OR = ',';
    const MEDIA_QUERY_OPERATOR_NOT = 'not';
    const MEDIA_QUERY_DEVICE_ALL = 'all';
    const MEDIA_QUERY_DEVICE_AURAL = 'aural';
    const MEDIA_QUERY_DEVICE_BRAILLE = 'braille';
    const MEDIA_QUERY_DEVICE_HANDHELD = 'handheld';
    const MEDIA_QUERY_DEVICE_PRINT = 'print';
    const MEDIA_QUERY_DEVICE_PROJECTION = 'projection';
    const MEDIA_QUERY_DEVICE_SCREEN = 'screen';
    const MEDIA_QUERY_DEVICE_TTY = 'tty';
    const MEDIA_QUERY_DEVICE_TV = 'tv';
    const MEDIA_QUERY_PROPERTY_WIDTH = 'width';
    const MEDIA_QUERY_PROPERTY_MIN_WIDTH = 'min-width';
    const MEDIA_QUERY_PROPERTY_MAX_WIDTH = 'max-width';
    const MEDIA_QUERY_PROPERTY_HEIGHT = 'height';
    const MEDIA_QUERY_PROPERTY_MIN_HEIGHT = 'min-height';
    const MEDIA_QUERY_PROPERTY_MAX_HEIGHT = 'max-height';
    const MEDIA_QUERY_PROPERTY_DEVICE_WIDTH = 'device-width';
    const MEDIA_QUERY_PROPERTY_MIN_DEVICE_WIDTH = 'min-device-width';
    const MEDIA_QUERY_PROPERTY_MAX_DEVICE_WIDTH = 'max-device-width';
    const MEDIA_QUERY_PROPERTY_DEVICE_HEIGHT = 'device-height';
    const MEDIA_QUERY_PROPERTY_MIN_DEVICE_HEIGHT = 'min-device-height';
    const MEDIA_QUERY_PROPERTY_MAX_DEVICE_HEIGHT = 'max-device-height';
    const MEDIA_QUERY_PROPERTY_ORIENTATION = 'orientation'; // portrait|landscape
    const MEDIA_QUERY_PROPERTY_ASPECT_RATIO = 'aspect-ratio';
    const MEDIA_QUERY_PROPERTY_MIN_ASPECT_RATIO = 'min-aspect-ratio';
    const MEDIA_QUERY_PROPERTY_MAX_ASPECT_RATIO = 'max-aspect-ratio';
    const MEDIA_QUERY_PROPERTY_DEVICE_ASPECT_RATIO = 'device-aspect-ratio';
    const MEDIA_QUERY_PROPERTY_MIN_DEVICE_ASPECT_RATIO = 'min-device-aspect-ratio';
    const MEDIA_QUERY_PROPERTY_MAX_DEVICE_ASPECT_RATIO = 'max-device-aspect-ratio';
    const MEDIA_QUERY_PROPERTY_COLOR = 'color';
    const MEDIA_QUERY_PROPERTY_MIN_COLOR = 'min-color';
    const MEDIA_QUERY_PROPERTY_MAX_COLOR = 'max-color';
    const MEDIA_QUERY_PROPERTY_COLOR_INDEX = 'color-index';
    const MEDIA_QUERY_PROPERTY_MIN_COLOR_INDEX = 'min-color-index';
    const MEDIA_QUERY_PROPERTY_MAX_COLOR_INDEX = 'max-color-index';
    const MEDIA_QUERY_PROPERTY_MONOCHROME = 'monochrome';
    const MEDIA_QUERY_PROPERTY_MIN_MONOCHROME = 'min-monochrome';
    const MEDIA_QUERY_PROPERTY_MAX_MONOCHROME = 'max-monochrome';
    const MEDIA_QUERY_PROPERTY_RESOLUTION = 'resolution';
    const MEDIA_QUERY_PROPERTY_MIN_RESOLUTION = 'min-resolution';
    const MEDIA_QUERY_PROPERTY_MAX_RESOLUTION = 'max-resolution';
    const MEDIA_QUERY_PROPERTY_SCAN = 'resolution'; // progressive|interlace
    const MEDIA_QUERY_PROPERTY_GRID = 'grid'; // 1 (for grid)|0 (for bitmap)
    
    /**
     * @var array
     */
    protected static $aMediaQueryOperators = [
        self::MEDIA_QUERY_OPERATOR_AND,
        self::MEDIA_QUERY_OPERATOR_OR,
        self::MEDIA_QUERY_OPERATOR_NOT
    ];
    
    /**
     * @var array
     */
    protected static $aMediaQueryDevices = [
        self::MEDIA_QUERY_DEVICE_ALL,
        self::MEDIA_QUERY_DEVICE_AURAL,
        self::MEDIA_QUERY_DEVICE_BRAILLE,
        self::MEDIA_QUERY_DEVICE_HANDHELD,
        self::MEDIA_QUERY_DEVICE_PRINT,
        self::MEDIA_QUERY_DEVICE_PROJECTION,
        self::MEDIA_QUERY_DEVICE_SCREEN,
        self::MEDIA_QUERY_DEVICE_TTY,
        self::MEDIA_QUERY_DEVICE_TV,
    ];
    
    /**
     * @var array
     */
    protected static $aMediaQueryProperties = [
        self::MEDIA_QUERY_PROPERTY_WIDTH,
        self::MEDIA_QUERY_PROPERTY_MIN_WIDTH,
        self::MEDIA_QUERY_PROPERTY_MAX_WIDTH,
        self::MEDIA_QUERY_PROPERTY_HEIGHT,
        self::MEDIA_QUERY_PROPERTY_MIN_HEIGHT,
        self::MEDIA_QUERY_PROPERTY_MAX_HEIGHT,
        self::MEDIA_QUERY_PROPERTY_DEVICE_WIDTH,
        self::MEDIA_QUERY_PROPERTY_MIN_DEVICE_WIDTH,
        self::MEDIA_QUERY_PROPERTY_MAX_DEVICE_WIDTH,
        self::MEDIA_QUERY_PROPERTY_DEVICE_HEIGHT,
        self::MEDIA_QUERY_PROPERTY_MIN_DEVICE_HEIGHT,
        self::MEDIA_QUERY_PROPERTY_MAX_DEVICE_HEIGHT,
        self::MEDIA_QUERY_PROPERTY_ORIENTATION,
        self::MEDIA_QUERY_PROPERTY_ASPECT_RATIO,
        self::MEDIA_QUERY_PROPERTY_MIN_ASPECT_RATIO,
        self::MEDIA_QUERY_PROPERTY_MAX_ASPECT_RATIO,
        self::MEDIA_QUERY_PROPERTY_DEVICE_ASPECT_RATIO,
        self::MEDIA_QUERY_PROPERTY_MIN_DEVICE_ASPECT_RATIO,
        self::MEDIA_QUERY_PROPERTY_MAX_DEVICE_ASPECT_RATIO,
        self::MEDIA_QUERY_PROPERTY_COLOR,
        self::MEDIA_QUERY_PROPERTY_MIN_COLOR,
        self::MEDIA_QUERY_PROPERTY_MAX_COLOR,
        self::MEDIA_QUERY_PROPERTY_COLOR_INDEX,
        self::MEDIA_QUERY_PROPERTY_MIN_COLOR_INDEX,
        self::MEDIA_QUERY_PROPERTY_MAX_COLOR_INDEX,
        self::MEDIA_QUERY_PROPERTY_MONOCHROME,
        self::MEDIA_QUERY_PROPERTY_MIN_MONOCHROME,
        self::MEDIA_QUERY_PROPERTY_MAX_MONOCHROME,
        self::MEDIA_QUERY_PROPERTY_RESOLUTION,
        self::MEDIA_QUERY_PROPERTY_MIN_RESOLUTION,
        self::MEDIA_QUERY_PROPERTY_MAX_RESOLUTION,
        self::MEDIA_QUERY_PROPERTY_SCAN,
        self::MEDIA_QUERY_PROPERTY_GRID
    ];
    
    /**
     * @var array
     */
    protected $aMediaQuery = [];
    
    /**
     * Style constructor
     *
     * @param Document $oDocument
     * @param string|null $sType [optional]
     * @param array $aMediaQuery [optional]
     * @param string|null $sDeclarations [optional]
     * @param boolean|null $bScoped [optional]
     * @throws \DOMException
     * @return void
     */
    public function __construct(
        Document $oDocument,
        ?string $sType = NULL,
        array $aMediaQuery = [],
        ?string $sDeclarations = NULL,
        ?bool $bScoped = NULL
    )
    {
        if ($sDeclarations !== NULL) {
            $sDeclarations = (string)$sDeclarations;
        }
        parent::__construct($oDocument, 'style', [], $sDeclarations, NULL);
        if ($sType !== NULL) {
            $this->setType($sType);
        }
        $this->setMediaQuery($aMediaQuery);
        if ($bScoped !== NULL) {
            $this->setScoped($bScoped);
        }
    }
    
    /**
     * @param Document $oDocument
     * @param string|null $sType [optional]
     * @param array $aMediaQuery [optional]
     * @param string|null $sDeclarations [optional]
     * @param boolean|null $bScoped [optional]
     * @throws \DOMException
     * @return StyleTag
     */
    public static function create(
        Document $oDocument,
        ?string $sType = NULL,
        array $aMediaQuery = [],
        ?string $sDeclarations = NULL,
        ?bool $bScoped = NULL
    ): StyleTag
    {
        return new static($oDocument, $sType, $aMediaQuery, $sDeclarations, $bScoped);
    }
    
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
     * @return StyleTag
     */
    public function updateMediaQueryAttribute(): StyleTag
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
     * @return StyleTag
     */
    public function addMediaQueryClause($sMediaQueryClause): StyleTag
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
     * @return StyleTag
     */
    public function setMediaQuery($aMediaQuery): StyleTag
    {
        if (is_array($aMediaQuery)) {
            foreach ($aMediaQuery as $sMediaQueryClause) {
                $this->addMediaQueryClause($sMediaQueryClause);
            }
        }
        return $this;
    }
    
    /**
     * @return bool
     */
    public function isScoped(): bool
    {
        if ($this->hasAttribute('scoped')) {
            return TRUE;
        }
        return FALSE;
    }
    
    /**
     * @param bool $bScoped
     * @return StyleTag
     */
    public function setScoped($bScoped): StyleTag
    {
        $bScoped = (bool)$bScoped;
        if ($bScoped) {
            $this->setAttribute('scoped', NULL);
        }
        else {
            $this->removeAttribute('scoped');
        }
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        if ($this->hasAttribute('type')) {
            return $this->getAttribute('type');
        }
        return NULL;
    }
    
    /**
     * @param string|null $sType
     * @throws \DOMException
     * @return StyleTag
     */
    public function setType($sType): StyleTag
    {
        if ($sType !== NULL && !in_array($sType, [ self::MEDIA_TYPE_CSS ])) {
            throw new \DOMException(sprintf("'%s' is not a valid 'type' value", (string)$sType));
        }
        $this->setAttribute('type', $sType);
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getDeclarations(): ?string
    {
        return $this->getInnerContent();
    }
    
    /**
     * @param string|null $sDeclarations
     * @return StyleTag
     */
    public function setDeclarations($sDeclarations): StyleTag
    {
        $this->setInnerContent($sDeclarations);
        return $this;
    }
    
}