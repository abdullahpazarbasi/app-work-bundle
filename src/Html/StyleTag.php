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
use AppWorkBundle\Traits\MediaQueryTrait;

/**
 * Class StyleTag
 */
class StyleTag extends Tag implements ComponentInterface
{
    
    use MediaQueryTrait;
    
    const MEDIA_TYPE_CSS = 'text/css';
    
    /**
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