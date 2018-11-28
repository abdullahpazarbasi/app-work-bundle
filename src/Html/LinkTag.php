<?php
/**
 * Copyright (c) 2018.
 */
/**
 * User: abdullah
 * Date: 22.11.2018
 * Time: 15:32
 */
namespace AppWorkBundle\Html;

/**
 * Class LinkTag
 */
class LinkTag extends Tag
{
    
    const CROSSORIGIN_ANONYMOUS = 'anonymous';
    const CROSSORIGIN_USE_CREDENTIALS = 'use-credentials';
    const REL_ALTERNATE = 'alternate';
    const REL_AUTHOR = 'author';
    const REL_DNS_PREFETCH = 'dns-prefetch';
    const REL_HELP = 'help';
    const REL_ICON = 'icon';
    const REL_LICENSE = 'license';
    const REL_NEXT = 'next';
    const REL_PINGBACK = 'pingback';
    const REL_PRECONNECT = 'preconnect';
    const REL_PREFETCH = 'prefetch';
    const REL_PRELOAD = 'preload';
    const REL_PRERENDER = 'prerender';
    const REL_PREV = 'prev';
    const REL_SEARCH = 'search';
    const REL_STYLESHEET = 'stylesheet';
    
    /**
     * @var array
     */
    protected static $aRels = [
        self::REL_ALTERNATE,
        self::REL_AUTHOR,
        self::REL_DNS_PREFETCH,
        self::REL_HELP,
        self::REL_ICON,
        self::REL_LICENSE,
        self::REL_NEXT,
        self::REL_PINGBACK,
        self::REL_PRECONNECT,
        self::REL_PREFETCH,
        self::REL_PRELOAD,
        self::REL_PRERENDER,
        self::REL_PREV,
        self::REL_SEARCH,
        self::REL_STYLESHEET
    ];
    
    /**
     * @var array
     */
    protected static $aCrossorigins = [
        self::CROSSORIGIN_ANONYMOUS,
        self::CROSSORIGIN_USE_CREDENTIALS
    ];
    
    /**
     * Link constructor
     *
     * @param Document $oDocument
     * @param string|null $sCrossOrigin [optional]
     * @param string|null $sHref [optional]
     * @param string|null $sHrefLang [optional]
     * @param string|null $sMedia [optional]
     * @param string|null $sRel [optional]
     * @param string|null $sSizes [optional] (HEIGHTxWIDTH|any)
     * @param string|null $sType [optional]
     * @param string|null $sItemProp [optional]
     * @throws \DOMException
     * @return void
     */
    public function __construct(
        Document $oDocument,
        ?string $sCrossOrigin = NULL,
        ?string $sHref = NULL,
        ?string $sHrefLang = NULL,
        ?string $sMedia = NULL,
        ?string $sRel = NULL,
        ?string $sSizes = NULL,
        ?string $sType = NULL,
        ?string $sItemProp = NULL
    )
    {
        parent::__construct($oDocument, 'link', [], NULL, NULL);
        if ($sCrossOrigin !== NULL) {
            $this->setCrossOrigin($sCrossOrigin);
        }
        if ($sHref !== NULL) {
            $this->setHref($sHref);
        }
        if ($sHrefLang !== NULL) {
            $this->setHrefLang($sHrefLang);
        }
        if ($sMedia !== NULL) {
            $this->setMedia($sMedia);
        }
        if ($sRel !== NULL) {
            $this->setRel($sRel);
        }
        if ($sSizes !== NULL) {
            $this->setSizes($sSizes);
        }
        if ($sType !== NULL) {
            $this->setType($sType);
        }
        if ($sItemProp !== NULL) {
            $this->setType($sItemProp);
        }
    }
    
    /**
     * @param Document $oDocument
     * @param string|null $sCrossOrigin [optional]
     * @param string|null $sHref [optional]
     * @param string|null $sHrefLang [optional]
     * @param string|null $sMedia [optional]
     * @param string|null $sRel [optional]
     * @param string|null $sSizes [optional]
     * @param string|null $sType [optional]
     * @param string|null $sItemProp [optional]
     * @throws \DOMException
     * @return LinkTag
     */
    public static function create(
        Document $oDocument,
        ?string $sCrossOrigin = NULL,
        ?string $sHref = NULL,
        ?string $sHrefLang = NULL,
        ?string $sMedia = NULL,
        ?string $sRel = NULL,
        ?string $sSizes = NULL,
        ?string $sType = NULL,
        ?string $sItemProp = NULL
    ): LinkTag
    {
        return new static($oDocument, $sCrossOrigin, $sHref, $sHrefLang, $sMedia, $sRel, $sSizes, $sType, $sItemProp);
    }
    
    /**
     * @return string|null
     */
    public function getCrossOrigin()
    {
        if ($this->hasAttribute('crossorigin')) {
            return $this->getAttribute('crossorigin');
        }
        return NULL;
    }
    
    /**
     * @param string|null $sCrossOrigin
     * @throws \DOMException
     * @return LinkTag
     */
    public function setCrossOrigin($sCrossOrigin)
    {
        if ($sCrossOrigin !== NULL && !in_array($sCrossOrigin, self::$aCrossorigins)) {
            throw new \DOMException(sprintf("'%s' is not a valid 'crossorigin' value", (string)$sCrossOrigin));
        }
        $this->setAttribute('crossorigin', $sCrossOrigin);
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getHref()
    {
        if ($this->hasAttribute('href')) {
            return $this->getAttribute('href');
        }
        return NULL;
    }
    
    /**
     * @param string|null $sHref
     * @return LinkTag
     */
    public function setHref($sHref)
    {
        $this->setAttribute('href', $sHref);
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getHrefLang()
    {
        if ($this->hasAttribute('hreflang')) {
            return $this->getAttribute('hreflang');
        }
        return NULL;
    }
    
    /**
     * @param string|null $sHrefLang
     * @return LinkTag
     */
    public function setHrefLang($sHrefLang)
    {
        $this->setAttribute('hreflang', $sHrefLang);
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getMedia()
    {
        if ($this->hasAttribute('media')) {
            return $this->getAttribute('media');
        }
        return NULL;
    }
    
    /**
     * @param string|null $sMedia
     * @return LinkTag
     */
    public function setMedia($sMedia)
    {
        $this->setAttribute('media', $sMedia);
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getRel()
    {
        if ($this->hasAttribute('rel')) {
            return $this->getAttribute('rel');
        }
        return NULL;
    }
    
    /**
     * @param string|null $sRel
     * @throws \DOMException
     * @return LinkTag
     */
    public function setRel($sRel)
    {
        if ($sRel !== NULL && !in_array($sRel, self::$aRels)) {
            throw new \DOMException(sprintf("'%s' is not a valid 'rel' value", (string)$sRel));
        }
        $this->setAttribute('rel', $sRel);
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getSizes()
    {
        if ($this->hasAttribute('sizes')) {
            return $this->getAttribute('sizes');
        }
        return NULL;
    }
    
    /**
     * @param string|null $sSizes
     * @return LinkTag
     */
    public function setSizes($sSizes)
    {
        $this->setAttribute('sizes', $sSizes);
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getType()
    {
        if ($this->hasAttribute('type')) {
            return $this->getAttribute('type');
        }
        return NULL;
    }
    
    /**
     * @param string|null $sType
     * @return LinkTag
     */
    public function setType($sType)
    {
        $this->setAttribute('type', $sType);
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getItemProp()
    {
        if ($this->hasAttribute('itemprop')) {
            return $this->getAttribute('itemprop');
        }
        return NULL;
    }
    
    /**
     * @param string|null $sItemProp
     * @return LinkTag
     */
    public function setItemProp($sItemProp)
    {
        $this->setAttribute('itemprop', $sItemProp);
        return $this;
    }
    
    /**
     * @param string $sInnerContent
     * @throws \DOMException
     */
    public function setInnerContent($sInnerContent)
    {
        throw new \DOMException("Link tags can not have inner html content, inner text content or inner value");
    }
    
}