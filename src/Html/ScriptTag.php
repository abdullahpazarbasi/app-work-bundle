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
 * Class ScriptTag
 */
class ScriptTag extends Tag
{
    
    const MEDIA_TYPE_APPLICATION_ECMASCRIPT = 'application/ecmascript';
    const MEDIA_TYPE_APPLICATION_JAVASCRIPT = 'application/javascript';
    const MEDIA_TYPE_TEXT_JAVASCRIPT = 'text/javascript';
    
    /**
     * @var array 
     */
    protected static $aMediaTypes = [
        self::MEDIA_TYPE_APPLICATION_ECMASCRIPT,
        self::MEDIA_TYPE_APPLICATION_JAVASCRIPT,
        self::MEDIA_TYPE_TEXT_JAVASCRIPT
    ];
    
    /**
     * Script constructor
     *
     * @param Document $oDocument
     * @param string|null $sSrc [optional]
     * @param string|null $sInlineScript [optional]
     * @param string|null $sType [optional]
     * @param string|null $sCharset [optional]
     * @param boolean|null $bAsync [optional]
     * @param boolean|null $bDefer [optional]
     * @throws \DOMException
     * @return void
     */
    public function __construct(
        Document $oDocument,
        ?string $sSrc = NULL,
        ?string $sInlineScript = NULL,
        ?string $sType = NULL,
        ?string $sCharset = NULL,
        ?bool $bAsync = NULL,
        ?bool $bDefer = NULL
    )
    {
        parent::__construct($oDocument, 'script', [], NULL, NULL);
        if ($sSrc !== NULL) {
            $this->setSrc($sSrc);
        }
        if ($sInlineScript !== NULL) {
            $this->setInlineScript($sInlineScript);
        }
        if ($sType !== NULL) {
            $this->setType($sType);
        }
        if ($sCharset !== NULL) {
            $this->setCharset($sCharset);
        }
        if ($bAsync !== NULL) {
            $this->setAsync($bAsync);
        }
        if ($bDefer !== NULL) {
            $this->setDefer($bDefer);
        }
    }
    
    /**
     * @param Document $oDocument
     * @param string|null $sSrc [optional]
     * @param string|null $sInlineScript [optional]
     * @param string|null $sType [optional]
     * @param string|null $sCharset [optional]
     * @param boolean|null $bAsync [optional]
     * @param boolean|null $bDefer [optional]
     * @throws \DOMException
     * @return ScriptTag
     */
    public static function create(
        Document $oDocument,
        ?string $sSrc = NULL,
        ?string $sInlineScript = NULL,
        ?string $sType = NULL,
        ?string $sCharset = NULL,
        ?bool $bAsync = NULL,
        ?bool $bDefer = NULL
    ): ScriptTag
    {
        return new static($oDocument, $sSrc, $sInlineScript, $sType, $sCharset, $bAsync, $bDefer);
    }
    
    /**
     * @return bool
     */
    public function isAsync()
    {
        if ($this->hasAttribute('async')) {
            return TRUE;
        }
        return FALSE;
    }
    
    /**
     * @param bool $bAsync
     * @return ScriptTag
     */
    public function setAsync($bAsync)
    {
        $bAsync = (bool)$bAsync;
        if ($bAsync) {
            $this->setAttribute('async', NULL);
        }
        else {
            $this->removeAttribute('async');
        }
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getCharset()
    {
        if ($this->hasAttribute('charset')) {
            return $this->getAttribute('charset');
        }
        return NULL;
    }
    
    /**
     * @param string|null $sCharset
     * @return ScriptTag
     */
    public function setCharset($sCharset)
    {
        $this->setAttribute('charset', $sCharset);
        return $this;
    }
    
    /**
     * @return bool
     */
    public function isDefer()
    {
        if ($this->hasAttribute('defer')) {
            return TRUE;
        }
        return FALSE;
    }
    
    /**
     * @param bool $bDefer
     * @return ScriptTag
     */
    public function setDefer($bDefer)
    {
        $bDefer = (bool)$bDefer;
        if ($bDefer) {
            $this->setAttribute('defer', NULL);
        }
        else {
            $this->removeAttribute('defer');
        }
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
     * @throws \DOMException
     * @return ScriptTag
     */
    public function setSrc($sSrc)
    {
        $sInlineScript = $this->getInlineScript();
        if ($sInlineScript !== NULL) {
            throw new \DOMException("Script tags can not have source url when inline script is defined");
        }
        $this->setAttribute('src', $sSrc);
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
     * @return ScriptTag
     */
    public function setType($sType)
    {
        if ($sType !== NULL && !in_array($sType, self::$aMediaTypes)) {
            return $this;
        }
        $this->setAttribute('type', $sType);
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getInlineScript()
    {
        return $this->getInnerContent();
    }
    
    /**
     * @param string|null $sInlineScript
     * @throws \DOMException
     * @return ScriptTag
     */
    public function setInlineScript($sInlineScript)
    {
        $sSrc = $this->getSrc();
        if ($sSrc !== NULL) {
            throw new \DOMException("Script tags can not have inner html content, inner text content or inner value when source is defined");
        }
        $this->setInnerContent($sInlineScript);
        return $this;
    }
    
}