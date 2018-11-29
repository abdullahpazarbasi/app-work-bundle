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

/**
 * Class ImgTag
 */
class ImgTag extends Tag
{
    
    const CROSSORIGIN_ANONYMOUS = 'anonymous';
    const CROSSORIGIN_USE_CREDENTIALS = 'use-credentials';
    
    /**
     * @var array
     */
    protected static $aCrossorigins = [
        self::CROSSORIGIN_ANONYMOUS,
        self::CROSSORIGIN_USE_CREDENTIALS
    ];
    
    /**
     * @param Document $oDocument
     * @param string|null $sAlt [optional]
     * @param string|null $sCrossOrigin [optional]
     * @param int|null $iWidth [optional]
     * @param int|null $iHeight [optional]
     * @param string|null $sSizes [optional] (HEIGHTxWIDTH|any)
     * @param boolean|null $bIsmap [optional]
     * @param string|null $sLongdesc [optional]
     * @param string|null $sSrc [optional]
     * @param string|null $sSrcset [optional]
     * @param string|null $sUsemap [optional]
     * @throws \DOMException
     * @return void
     */
    public function __construct(
        Document $oDocument,
        ?string $sAlt = NULL,
        ?string $sCrossOrigin = NULL,
        ?int $iWidth = NULL,
        ?int $iHeight = NULL,
        ?string $sSizes = NULL,
        ?bool $bIsmap = NULL,
        ?string $sLongdesc = NULL,
        ?string $sSrc = NULL,
        ?string $sSrcset = NULL,
        ?string $sUsemap = NULL
    )
    {
        parent::__construct($oDocument, 'img', [], NULL, NULL);
        if ($sAlt !== NULL) {
            $this->setAlt($sAlt);
        }
        if ($sCrossOrigin !== NULL) {
            $this->setCrossOrigin($sCrossOrigin);
        }
        if ($iWidth !== NULL) {
            $this->setWidth($iWidth);
        }
        if ($iHeight !== NULL) {
            $this->setHeight($iHeight);
        }
        if ($sSizes !== NULL) {
            $this->setSizes($sSizes);
        }
        if ($bIsmap !== NULL) {
            $this->setIsmap($bIsmap);
        }
        if ($sLongdesc !== NULL) {
            $this->setLongdesc($sLongdesc);
        }
        if ($sSrc !== NULL) {
            $this->setSrc($sSrc);
        }
        if ($sSrcset !== NULL) {
            $this->setSrcset($sSrcset);
        }
        if ($sUsemap !== NULL) {
            $this->setUsemap($sUsemap);
        }
    }
    
    /**
     * @param Document $oDocument
     * @param string|null $sAlt [optional]
     * @param string|null $sCrossOrigin [optional]
     * @param int|null $iWidth [optional]
     * @param int|null $iHeight [optional]
     * @param string|null $sSizes [optional] (HEIGHTxWIDTH|any)
     * @param boolean|null $bIsmap [optional]
     * @param string|null $sLongdesc [optional]
     * @param string|null $sSrc [optional]
     * @param string|null $sSrcset [optional]
     * @param string|null $sUsemap [optional]
     * @throws \DOMException
     * @return ImgTag
     */
    public static function create(
        Document $oDocument,
        ?string $sAlt = NULL,
        ?string $sCrossOrigin = NULL,
        ?int $iWidth = NULL,
        ?int $iHeight = NULL,
        ?string $sSizes = NULL,
        ?bool $bIsmap = NULL,
        ?string $sLongdesc = NULL,
        ?string $sSrc = NULL,
        ?string $sSrcset = NULL,
        ?string $sUsemap = NULL
    ): ImgTag
    {
        return new static(
            $oDocument,
            $sAlt,
            $sCrossOrigin,
            $iWidth,
            $iHeight,
            $sSizes,
            $bIsmap,
            $sLongdesc,
            $sSrc,
            $sSrcset,
            $sUsemap
        );
    }
    
    /**
     * @return string|null
     */
    public function getAlt()
    {
        if ($this->hasAttribute('alt')) {
            return $this->getAttribute('alt');
        }
        return NULL;
    }
    
    /**
     * @param string|null $sAlt
     * @return ImgTag
     */
    public function setAlt($sAlt)
    {
        $this->setAttribute('alt', $sAlt);
        return $this;
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
     * @return ImgTag
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
     * @return int|null
     */
    public function getWidth()
    {
        if ($this->hasAttribute('width')) {
            return intval($this->getAttribute('width'));
        }
        return NULL;
    }
    
    /**
     * @param int|null $iWidth
     * @return ImgTag
     */
    public function setWidth($iWidth)
    {
        $this->setAttribute('width', (string)$iWidth);
        return $this;
    }
    
    /**
     * @return int|null
     */
    public function getHeight()
    {
        if ($this->hasAttribute('height')) {
            return intval($this->getAttribute('height'));
        }
        return NULL;
    }
    
    /**
     * @param int|null $iHeight
     * @return ImgTag
     */
    public function setHeight($iHeight)
    {
        $this->setAttribute('height', (string)$iHeight);
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
     * @return ImgTag
     */
    public function setSizes($sSizes)
    {
        $this->setAttribute('sizes', $sSizes);
        return $this;
    }
    
    /**
     * @return bool
     */
    public function isIsmap()
    {
        if ($this->hasAttribute('ismap')) {
            return TRUE;
        }
        return FALSE;
    }
    
    /**
     * @param bool $bIsmap
     * @return ImgTag
     */
    public function setIsmap($bIsmap)
    {
        $bIsmap = (bool)$bIsmap;
        if ($bIsmap) {
            $this->setAttribute('ismap', NULL);
        }
        else {
            $this->removeAttribute('ismap');
        }
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getLongdesc()
    {
        if ($this->hasAttribute('longdesc')) {
            return $this->getAttribute('longdesc');
        }
        return NULL;
    }
    
    /**
     * @param string|null $sLongdesc
     * @return ImgTag
     */
    public function setLongdesc($sLongdesc)
    {
        $this->setAttribute('longdesc', $sLongdesc);
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getSrc()
    {
        if ($this->hasAttribute('src')) {
            return $this->getAttribute('src');
        }
        return NULL;
    }
    
    /**
     * @param string|null $sSrc
     * @return ImgTag
     */
    public function setSrc($sSrc)
    {
        $this->setAttribute('src', $sSrc);
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getSrcset()
    {
        if ($this->hasAttribute('srcset')) {
            return $this->getAttribute('srcset');
        }
        return NULL;
    }
    
    /**
     * @param string|null $sSrcset
     * @return ImgTag
     */
    public function setSrcset($sSrcset)
    {
        $this->setAttribute('srcset', $sSrcset);
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getUsemap()
    {
        if ($this->hasAttribute('usemap')) {
            return $this->getAttribute('usemap');
        }
        return NULL;
    }
    
    /**
     * @param string|null $sUsemap
     * @return ImgTag
     */
    public function setUsemap($sUsemap)
    {
        $this->setAttribute('usemap', $sUsemap);
        return $this;
    }
    
}