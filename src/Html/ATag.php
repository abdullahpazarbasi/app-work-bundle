<?php
/**
 * Copyright (c) 2018.
 */
/**
 * User: abdullah
 * Date: 22.11.2018
 * Time: 16:09
 */
namespace AppWorkBundle\Html;

use AppWorkBundle\Traits\MediaQueryTrait;

/**
 * Class ATag
 */
class ATag extends Tag
{
    
    use MediaQueryTrait;
    
    const REL_ALTERNATE = 'alternate';
    const REL_AUTHOR = 'author';
    const REL_BOOKMARK = 'bookmark';
    const REL_EXTERNAL = 'external';
    const REL_HELP = 'help';
    const REL_LICENSE = 'license';
    const REL_NEXT = 'next';
    const REL_NOFOLLOW = 'nofollow';
    const REL_NOREFERRER = 'noreferrer';
    const REL_NOOPENER = 'noopener';
    const REL_PREV = 'prev';
    const REL_SEARCH = 'search';
    const REL_TAG = 'tag';
    
    /**
     * @var array
     */
    protected static $aRels = [
        self::REL_ALTERNATE,
        self::REL_AUTHOR,
        self::REL_BOOKMARK,
        self::REL_EXTERNAL,
        self::REL_HELP,
        self::REL_LICENSE,
        self::REL_NEXT,
        self::REL_NOFOLLOW,
        self::REL_NOREFERRER,
        self::REL_NOOPENER,
        self::REL_PREV,
        self::REL_SEARCH,
        self::REL_TAG
    ];
    
    /**
     * @param Document $oDocument
     * @param string|null $sTextContent [optional]
     * @param string|null $sDownload [optional]
     * @param string|null $sHref [optional]
     * @param string|null $sHreflang [optional]
     * @param array $aMediaQuery [optional]
     * @param string|null $sPing [optional]
     * @param string|null $sRel [optional]
     * @param string|null $sTarget [optional]
     * @param string|null $sType [optional]
     * @throws \DOMException
     * @return void
     */
    public function __construct(
        Document $oDocument,
        ?string $sTextContent = NULL,
        ?string $sDownload = NULL,
        ?string $sHref = NULL,
        ?string $sHreflang = NULL,
        array $aMediaQuery = [],
        ?string $sPing = NULL,
        ?string $sRel = NULL,
        ?string $sTarget = NULL,
        ?string $sType = NULL
    )
    {
        if ($sTextContent !== NULL) {
            $sTextContent = (string)$sTextContent;
        }
        parent::__construct($oDocument, 'a', [], $sTextContent, NULL);
        if ($sDownload !== NULL) {
            $this->setDownload($sDownload);
        }
        if ($sHref !== NULL) {
            $this->setHref($sHref);
        }
        if ($sHreflang !== NULL) {
            $this->setHreflang($sHreflang);
        }
        $this->setMediaQuery($aMediaQuery);
        if ($sPing !== NULL) {
            $this->setPing($sPing);
        }
        if ($sRel !== NULL) {
            $this->setRel($sRel);
        }
        if ($sTarget !== NULL) {
            $this->setTarget($sTarget);
        }
        if ($sType !== NULL) {
            $this->setType($sType);
        }
    }
    
    /**
     * @param Document $oDocument
     * @param string|null $sDownload [optional]
     * @param string|null $sHref [optional]
     * @param string|null $sHreflang [optional]
     * @param array $aMediaQuery [optional]
     * @param string|null $sPing [optional]
     * @param string|null $sRel [optional]
     * @param string|null $sTarget [optional]
     * @param string|null $sType [optional]
     * @throws \DOMException
     * @return ATag
     */
    public static function create(
        Document $oDocument,
        ?string $sDownload = NULL,
        ?string $sHref = NULL,
        ?string $sHreflang = NULL,
        array $aMediaQuery = [],
        ?string $sPing = NULL,
        ?string $sRel = NULL,
        ?string $sTarget = NULL,
        ?string $sType = NULL
    ): ATag
    {
        return new static(
            $oDocument,
            $sDownload,
            $sHref,
            $sHreflang,
            $aMediaQuery,
            $sPing,
            $sRel,
            $sTarget,
            $sType
        );
    }
    
    /**
     * @return string|null
     */
    public function getDownload()
    {
        if ($this->hasAttribute('download')) {
            return $this->getAttribute('download');
        }
        return NULL;
    }
    
    /**
     * @param string|null $sDownload
     * @return ATag
     */
    public function setDownload($sDownload)
    {
        $this->setAttribute('download', $sDownload);
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
     * @return ATag
     */
    public function setHref($sHref)
    {
        $this->setAttribute('href', $sHref);
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getHreflang()
    {
        if ($this->hasAttribute('hreflang')) {
            return $this->getAttribute('hreflang');
        }
        return NULL;
    }
    
    /**
     * @param string|null $sHreflang
     * @return ATag
     */
    public function setHreflang($sHreflang)
    {
        $this->setAttribute('hreflang', $sHreflang);
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getPing()
    {
        if ($this->hasAttribute('ping')) {
            return $this->getAttribute('ping');
        }
        return NULL;
    }
    
    /**
     * @param string|null $sPing
     * @return ATag
     */
    public function setPing($sPing)
    {
        $this->setAttribute('ping', $sPing);
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
     * @return ATag
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
    public function getTarget()
    {
        if ($this->hasAttribute('target')) {
            return $this->getAttribute('target');
        }
        return NULL;
    }
    
    /**
     * @param string|null $sTarget
     * @return ATag
     */
    public function setTarget($sTarget)
    {
        $this->setAttribute('target', $sTarget);
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
     * @return ATag
     */
    public function setType($sType)
    {
        $this->setAttribute('type', $sType);
        return $this;
    }
    
}