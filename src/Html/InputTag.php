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

use AppWorkBundle\Theme\ComponentInterface;

/**
 * Class InputTag
 */
class InputTag extends Tag implements ComponentInterface
{
    
    const TYPE_BUTTON = 'button';
    const TYPE_CHECKBOX = 'checkbox';
    const TYPE_COLOR = 'color';
    const TYPE_DATE = 'date';
    const TYPE_DATETIME_LOCAL = 'datetime-local';
    const TYPE_EMAIL = 'email';
    const TYPE_FILE = 'file';
    const TYPE_HIDDEN = 'hidden';
    const TYPE_IMAGE = 'image';
    const TYPE_MONTH = 'month';
    const TYPE_NUMBER = 'number';
    const TYPE_PASSWORD = 'password';
    const TYPE_RADIO = 'radio';
    const TYPE_RANGE = 'range';
    const TYPE_RESET = 'reset';
    const TYPE_SEARCH = 'search';
    const TYPE_SUBMIT = 'submit';
    const TYPE_TEL = 'tel';
    const TYPE_TEXT = 'text';
    const TYPE_TIME = 'time';
    const TYPE_URL = 'url';
    const TYPE_WEEK = 'week';
    
    /**
     * @var array
     */
    protected static $aTypes = [
        self::TYPE_BUTTON,
        self::TYPE_CHECKBOX,
        self::TYPE_COLOR,
        self::TYPE_DATE,
        self::TYPE_DATETIME_LOCAL,
        self::TYPE_EMAIL,
        self::TYPE_FILE,
        self::TYPE_HIDDEN,
        self::TYPE_IMAGE,
        self::TYPE_MONTH,
        self::TYPE_NUMBER,
        self::TYPE_PASSWORD,
        self::TYPE_RADIO,
        self::TYPE_RANGE,
        self::TYPE_RESET,
        self::TYPE_SEARCH,
        self::TYPE_SUBMIT,
        self::TYPE_TEL,
        self::TYPE_TEXT,
        self::TYPE_TIME,
        self::TYPE_URL,
        self::TYPE_WEEK
    ];
    
    /**
     * @param Document $oDocument
     * @param string|null $sAccept [optional]
     * @param string|null $sAlt [optional]
     * @param bool|null $bAutocomplete [optional]
     * @param bool $bAutofocus [optional]
     * @param bool $bChecked [optional]
     * @param string|null $sDirname [optional]
     * @param bool $bDisabled [optional]
     * @param string|null $sForm [optional]
     * @param string|null $sFormaction [optional]
     * @param string|null $sFormenctype [optional]
     * @param string|null $sFormmethod [optional]
     * @param string|null $sFormnovalidate [optional]
     * @param string|null $sFormtarget [optional]
     * @param int|null $iWidth [optional]
     * @param int|null $iHeight [optional]
     * @param string|null $sList [optional]
     * @param string|null $sMax [optional]
     * @param int|null $iMaxlength [optional]
     * @param string|null $sMin [optional]
     * @param bool $bMultiple [optional]
     * @param string|null $sName [optional]
     * @param string|null $sPattern [optional]
     * @param string|null $sPlaceholder [optional]
     * @param bool $bReadonly [optional]
     * @param bool $bRequired [optional]
     * @param int|null $iSize [optional]
     * @param string|null $sSrc [optional]
     * @param int|null $iStep [optional]
     * @param string|null $sType [optional]
     * @param string|null $sValue [optional]
     * @throws \DOMException
     * @return void
     */
    public function __construct(
        Document $oDocument,
        ?string $sAccept = NULL,
        ?string $sAlt = NULL,
        ?bool $bAutocomplete = NULL,
        bool $bAutofocus = FALSE,
        bool $bChecked = FALSE,
        ?string $sDirname = NULL,
        bool $bDisabled = FALSE,
        ?string $sForm = NULL,
        ?string $sFormaction = NULL,
        ?string $sFormenctype = NULL,
        ?string $sFormmethod = NULL,
        ?string $sFormnovalidate = NULL,
        ?string $sFormtarget = NULL,
        ?int $iWidth = NULL,
        ?int $iHeight = NULL,
        ?string $sList = NULL,
        ?string $sMax = NULL,
        ?int $iMaxlength = NULL,
        ?string $sMin = NULL,
        bool $bMultiple = FALSE,
        ?string $sName = NULL,
        ?string $sPattern = NULL,
        ?string $sPlaceholder = NULL,
        bool $bReadonly = FALSE,
        bool $bRequired = FALSE,
        ?int $iSize = NULL,
        ?string $sSrc = NULL,
        ?int $iStep = NULL,
        ?string $sType = NULL,
        ?string $sValue = NULL
    )
    {
        parent::__construct($oDocument, 'img', [], NULL, NULL);
        if ($sAccept !== NULL) {
            $this->setAccept($sAccept);
        }
        if ($sAlt !== NULL) {
            $this->setAlt($sAlt);
        }
        if ($bAutocomplete !== NULL) {
            $this->setAutocomplete($bAutocomplete);
        }
        if ($bAutofocus !== NULL) {
            $this->setAutofocus($bAutofocus);
        }
        if ($bChecked !== NULL) {
            $this->setChecked($bChecked);
        }
        if ($sDirname !== NULL) {
            $this->setDirname($sDirname);
        }
        if ($bDisabled !== NULL) {
            $this->setDisabled($bDisabled);
        }
        if ($sForm !== NULL) {
            $this->setForm($sForm);
        }
        if ($sFormaction !== NULL) {
            $this->setFormaction($sFormaction);
        }
        if ($sFormenctype !== NULL) {
            $this->setFormenctype($sFormenctype);
        }
        if ($sFormmethod !== NULL) {
            $this->setFormmethod($sFormmethod);
        }
        if ($sFormnovalidate !== NULL) {
            $this->setFormnovalidate($sFormnovalidate);
        }
        if ($sFormtarget !== NULL) {
            $this->setFormtarget($sFormtarget);
        }
        if ($iWidth !== NULL) {
            $this->setWidth($iWidth);
        }
        if ($iHeight !== NULL) {
            $this->setHeight($iHeight);
        }
        if ($sList !== NULL) {
            $this->setList($sList);
        }
        if ($sMax !== NULL) {
            $this->setMax($sMax);
        }
        if ($iMaxlength !== NULL) {
            $this->setMaxlength($iMaxlength);
        }
        if ($sMin !== NULL) {
            $this->setMin($sMin);
        }
        if ($bMultiple !== NULL) {
            $this->setMultiple($bMultiple);
        }
        if ($sName !== NULL) {
            $this->setName($sName);
        }
        if ($sPattern !== NULL) {
            $this->setPattern($sPattern);
        }
        if ($sPlaceholder !== NULL) {
            $this->setPlaceholder($sPlaceholder);
        }
        if ($bReadonly !== NULL) {
            $this->setReadonly($bReadonly);
        }
        if ($bRequired !== NULL) {
            $this->setRequired($bRequired);
        }
        if ($iSize !== NULL) {
            $this->setSize($iSize);
        }
        if ($sSrc !== NULL) {
            $this->setSrc($sSrc);
        }
        if ($iStep !== NULL) {
            $this->setStep($iStep);
        }
        if ($sType !== NULL) {
            $this->setType($sType);
        }
        if ($sValue !== NULL) {
            $this->setValue($sValue);
        }
    }
    
    /**
     * @param Document $oDocument
     * @param string|null $sAccept [optional]
     * @param string|null $sAlt [optional]
     * @param bool|null $bAutocomplete [optional]
     * @param bool $bAutofocus [optional]
     * @param bool $bChecked [optional]
     * @param string|null $sDirname [optional]
     * @param bool $bDisabled [optional]
     * @param string|null $sForm [optional]
     * @param string|null $sFormaction [optional]
     * @param string|null $sFormenctype [optional]
     * @param string|null $sFormmethod [optional]
     * @param string|null $sFormnovalidate [optional]
     * @param string|null $sFormtarget [optional]
     * @param int|null $iWidth [optional]
     * @param int|null $iHeight [optional]
     * @param string|null $sList [optional]
     * @param string|null $sMax [optional]
     * @param int|null $iMaxlength [optional]
     * @param string|null $sMin [optional]
     * @param bool $bMultiple [optional]
     * @param string|null $sName [optional]
     * @param string|null $sPattern [optional]
     * @param string|null $sPlaceholder [optional]
     * @param bool $bReadonly [optional]
     * @param bool $bRequired [optional]
     * @param int|null $iSize [optional]
     * @param string|null $sSrc [optional]
     * @param int|null $iStep [optional]
     * @param string|null $sType [optional]
     * @param string|null $sValue [optional]
     * @throws \DOMException
     * @return InputTag
     */
    public static function create(
        Document $oDocument,
        ?string $sAccept = NULL,
        ?string $sAlt = NULL,
        ?bool $bAutocomplete = NULL,
        bool $bAutofocus = FALSE,
        bool $bChecked = FALSE,
        ?string $sDirname = NULL,
        bool $bDisabled = FALSE,
        ?string $sForm = NULL,
        ?string $sFormaction = NULL,
        ?string $sFormenctype = NULL,
        ?string $sFormmethod = NULL,
        ?string $sFormnovalidate = NULL,
        ?string $sFormtarget = NULL,
        ?int $iWidth = NULL,
        ?int $iHeight = NULL,
        ?string $sList = NULL,
        ?string $sMax = NULL,
        ?int $iMaxlength = NULL,
        ?string $sMin = NULL,
        bool $bMultiple = FALSE,
        ?string $sName = NULL,
        ?string $sPattern = NULL,
        ?string $sPlaceholder = NULL,
        bool $bReadonly = FALSE,
        bool $bRequired = FALSE,
        ?int $iSize = NULL,
        ?string $sSrc = NULL,
        ?int $iStep = NULL,
        ?string $sType = NULL,
        ?string $sValue = NULL
    ): InputTag
    {
        return new static(
            $oDocument,
            $sAccept,
            $sAlt,
            $bAutocomplete,
            $bAutofocus,
            $bChecked,
            $sDirname,
            $bDisabled,
            $sForm,
            $sFormaction,
            $sFormenctype,
            $sFormmethod,
            $sFormnovalidate,
            $sFormtarget,
            $iWidth,
            $iHeight,
            $sList,
            $sMax,
            $iMaxlength,
            $sMin,
            $bMultiple,
            $sName,
            $sPattern,
            $sPlaceholder,
            $bReadonly,
            $bRequired,
            $iSize,
            $sSrc,
            $iStep,
            $sType,
            $sValue
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
     * @return InputTag
     */
    public function setAlt($sAlt)
    {
        $this->setAttribute('alt', $sAlt);
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
     * @return InputTag
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
     * @return InputTag
     */
    public function setHeight($iHeight)
    {
        $this->setAttribute('height', (string)$iHeight);
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
     * @return InputTag
     */
    public function setSrc($sSrc)
    {
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
     * @throws \DOMException
     * @return InputTag
     */
    public function setType($sType)
    {
        if ($sType !== NULL && !in_array($sType, self::$aTypes)) {
            throw new \DOMException(sprintf("'%s' is not a valid 'type' value", (string)$sType));
        }
        $this->setAttribute('type', $sType);
        return $this;
    }
    
}