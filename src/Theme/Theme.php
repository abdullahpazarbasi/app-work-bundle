<?php
/**
 * Copyright (c) 2018.
 */
/**
 * User: abdullah
 * Date: 22.11.2018
 * Time: 14:30
 */
namespace AppWorkBundle\Theme;

use AppWorkBundle\ArrayableInterface;
use AppWorkBundle\Html\Document;
use AppWorkBundle\Html\LinkTag;
use AppWorkBundle\Html\ScriptTag;
use AppWorkBundle\JsonableInterface;
use AppWorkBundle\Theme\Sections\Footer\Footer;
use AppWorkBundle\Theme\Sections\Main\Main;
use AppWorkBundle\Theme\Sections\Navbar\Navbar;
use AppWorkBundle\Theme\Sections\Sidenav\Sidenav;

/**
 * Class Theme
 *
 * @property Document document
 */
class Theme implements ArrayableInterface, JsonableInterface
{
    
    /**
     * @var Document
     */
    protected static $oDocument;
    
    /**
     * @var array
     */
    protected $aData = [];
    
    /**
     * Theme constructor
     *
     * @param null|string $sVersion [optional]
     * @param null|string $sEncoding [optional]
     * @param Document|null $oDocument [optional]
     * @throws \DOMException
     * @return void
     */
    public function __construct(?string $sVersion = NULL, ?string $sEncoding = NULL, ?Document $oDocument = NULL)
    {
        if ($oDocument !== NULL) {
            self::$oDocument = $oDocument;
        }
        else {
            self::$oDocument = new Document($sVersion, $sEncoding);
        }
        $this->aData = $this->giveDefault();
    }
    
    /**
     * @throws \DOMException
     * @return array
     */
    public function giveDefault(): array
    {
        $oFavicon = new LinkTag(
            self::$oDocument,
            NULL,
            '/favicon.ico',
            NULL,
            NULL,
            LinkTag::REL_ICON,
            NULL,
            'image/x-icon',
            NULL
        );
        $oFontCollection = new ComponentCollection();
        $oFontCollection[] = new LinkTag(
            self::$oDocument,
            NULL,
            'https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900',
            NULL,
            NULL,
            LinkTag::REL_STYLESHEET,
            NULL,
            NULL,
            NULL
        );
        $oIconCollection = new ComponentCollection();
        $oIconCollection[] = new LinkTag(
            self::$oDocument,
            NULL,
            '/bundles/appwork/vendor/fonts/fontawesome.css',
            NULL,
            NULL,
            LinkTag::REL_STYLESHEET,
            NULL,
            NULL,
            NULL
        );
        $oIconCollection[] = new LinkTag(
            self::$oDocument,
            NULL,
            '/bundles/appwork/vendor/fonts/ionicons.css',
            NULL,
            NULL,
            LinkTag::REL_STYLESHEET,
            NULL,
            NULL,
            NULL
        );
        $oIconCollection[] = new LinkTag(
            self::$oDocument,
            NULL,
            '/bundles/appwork/vendor/fonts/linearicons.css',
            NULL,
            NULL,
            LinkTag::REL_STYLESHEET,
            NULL,
            NULL,
            NULL
        );
        $oIconCollection[] = new LinkTag(
            self::$oDocument,
            NULL,
            '/bundles/appwork/vendor/fonts/open-iconic.css',
            NULL,
            NULL,
            LinkTag::REL_STYLESHEET,
            NULL,
            NULL,
            NULL
        );
        $oIconCollection[] = new LinkTag(
            self::$oDocument,
            NULL,
            '/bundles/appwork/vendor/fonts/pe-icon-7-stroke.css',
            NULL,
            NULL,
            LinkTag::REL_STYLESHEET,
            NULL,
            NULL,
            NULL
        );
        $oCoreStyleSheetCollection = new ComponentCollection();
        $oNode = new LinkTag(
            self::$oDocument,
            NULL,
            '/bundles/appwork/vendor/css/rtl/bootstrap.css',
            NULL,
            NULL,
            LinkTag::REL_STYLESHEET,
            NULL,
            NULL,
            NULL
        );
        $oNode->setAttribute('class', 'theme-settings-bootstrap-css');
        $oCoreStyleSheetCollection[] = $oNode;
        $oNode = new LinkTag(
            self::$oDocument,
            NULL,
            '/bundles/appwork/vendor/css/rtl/appwork.css',
            NULL,
            NULL,
            LinkTag::REL_STYLESHEET,
            NULL,
            NULL,
            NULL
        );
        $oNode->setAttribute('class', 'theme-settings-appwork-css');
        $oCoreStyleSheetCollection[] = $oNode;
        $oNode = new LinkTag(
            self::$oDocument,
            NULL,
            '/bundles/appwork/vendor/css/rtl/theme-corporate.css',
            NULL,
            NULL,
            LinkTag::REL_STYLESHEET,
            NULL,
            NULL,
            NULL
        );
        $oNode->setAttribute('class', 'theme-settings-theme-css');
        $oCoreStyleSheetCollection[] = $oNode;
        $oNode = new LinkTag(
            self::$oDocument,
            NULL,
            '/bundles/appwork/vendor/css/rtl/colors.css',
            NULL,
            NULL,
            LinkTag::REL_STYLESHEET,
            NULL,
            NULL,
            NULL
        );
        $oNode->setAttribute('class', 'theme-settings-colors-css');
        $oCoreStyleSheetCollection[] = $oNode;
        $oNode = new LinkTag(
            self::$oDocument,
            NULL,
            '/bundles/appwork/vendor/css/rtl/uikit.css',
            NULL,
            NULL,
            LinkTag::REL_STYLESHEET,
            NULL,
            NULL,
            NULL
        );
        $oCoreStyleSheetCollection[] = $oNode;
        $oCustomStyleSheetCollection = new ComponentCollection();
        $oCustomStyleSheetCollection[] = new LinkTag(
            self::$oDocument,
            NULL,
            '/bundles/appwork/custom/css/layout-default-priority-left.css',
            NULL,
            NULL,
            LinkTag::REL_STYLESHEET,
            NULL,
            NULL,
            NULL
        );
        $oCoreScriptCollection = new ComponentCollection();
        $oCoreScriptCollection[] = new ScriptTag(
            self::$oDocument,
            '/bundles/appwork/vendor/libs/popper/popper.js',
            NULL
        );
        $oCoreScriptCollection[] = new ScriptTag(
            self::$oDocument,
            '/bundles/appwork/vendor/js/bootstrap.js',
            NULL
        );
        $oCoreScriptCollection[] = new ScriptTag(
            self::$oDocument,
            '/bundles/appwork/vendor/js/sidenav.js',
            NULL
        );
        $oHelperScriptCollection = new ComponentCollection();
        $oHelperScriptCollection[] = new ScriptTag(
            self::$oDocument,
            '/bundles/appwork/vendor/js/material-ripple.js',
            NULL
        );
        $oHelperScriptCollection[] = new ScriptTag(
            self::$oDocument,
            '/bundles/appwork/vendor/js/layout-helpers.js',
            NULL
        );
        $oHelperScriptCollection[] = new ScriptTag(
            self::$oDocument,
            '/bundles/appwork/vendor/js/theme-settings.js',
            NULL
        );
        $oHeadScriptCollection = new ComponentCollection();
        $oHeadScriptCollection[] = new ScriptTag(
            self::$oDocument,
            '/bundles/appwork/vendor/js/pace.js',
            NULL
        );
        $oHeadScriptCollection[] = new ScriptTag(
            self::$oDocument,
            'https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js',
            NULL
        );
        $oLibStyleSheetCollection = new ComponentCollection();
        $oLibStyleSheetCollection[] = new LinkTag(
            self::$oDocument,
            NULL,
            '/bundles/appwork/vendor/libs/perfect-scrollbar/perfect-scrollbar.css',
            NULL,
            NULL,
            LinkTag::REL_STYLESHEET,
            NULL,
            NULL,
            NULL
        );
        $oLibScriptCollection = new ComponentCollection();
        $oLibScriptCollection[] = new ScriptTag(
            self::$oDocument,
            '/bundles/appwork/vendor/libs/perfect-scrollbar/perfect-scrollbar.js',
            NULL
        );
        $oNavbarSection = new Navbar($this);
        $oSidenavSection = new Sidenav($this);
        $oMainSection = new Main($this);
        $oFooterSection = new Footer($this);
        $aO = [
            'charset' => self::$oDocument->encoding,
            'favicon' => $oFavicon,
            'fonts' => $oFontCollection,
            'icons' => $oIconCollection,
            'coreStyleSheets' => $oCoreStyleSheetCollection,
            'customStyleSheets' => $oCustomStyleSheetCollection,
            'coreScripts' => $oCoreScriptCollection,
            'helperScripts' => $oHelperScriptCollection,
            'headScripts' => $oHeadScriptCollection,
            'styleSheetsOfLibs' => $oLibStyleSheetCollection,
            'scriptsOfLibs' => $oLibScriptCollection,
            'navbar' => $oNavbarSection,
            'sidenav' => $oSidenavSection,
            'main' => $oMainSection,
            'footer' => $oFooterSection
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
            'charset',
            'favicon',
            'fonts',
            'icons',
            'coreStyleSheets',
            'customStyleSheets',
            'coreScripts',
            'helperScripts',
            'headScripts',
            'styleSheetsOfLibs',
            'scriptsOfLibs',
            'navbar',
            'sidenav',
            'main',
            'footer',
            'document'
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
        if ($name === 'charset') {
            if (!is_string($value)) {
                throw new \UnexpectedValueException("charset must be a string");
            }
            $this->aData['charset'] = $value;
            return;
        }
        if ($name === 'favicon') {
            if (!is_object($value) || !($value instanceof LinkTag)) {
                throw new \UnexpectedValueException(sprintf("favicon must be an instance of '%1\$s'", LinkTag::class));
            }
            $this->aData['favicon'] = $value;
            return;
        }
        if (in_array($name, [
            'fonts',
            'icons',
            'coreStyleSheets',
            'customStyleSheets',
            'coreScripts',
            'helperScripts',
            'headScripts',
            'styleSheetsOfLibs',
            'scriptsOfLibs'
        ])) {
            if (!is_object($value) || !($value instanceof ComponentCollection)) {
                throw new \UnexpectedValueException(sprintf("%1\$s must be an instance of '%2\$s'", $name, ComponentCollection::class));
            }
            $this->aData[$name] = $value;
            return;
        }
        if ($name === 'navbar') {
            if (!is_object($value) || !($value instanceof Navbar)) {
                throw new \UnexpectedValueException(sprintf("navbar must be an instance of '%1\$s'", Navbar::class));
            }
            $this->aData['navbar'] = $value;
            return;
        }
        if ($name === 'sidenav') {
            if (!is_object($value) || !($value instanceof Sidenav)) {
                throw new \UnexpectedValueException(sprintf("sidenav must be an instance of '%1\$s'", Sidenav::class));
            }
            $this->aData['sidenav'] = $value;
            return;
        }
        if ($name === 'main') {
            if (!is_object($value) || !($value instanceof Main)) {
                throw new \UnexpectedValueException(sprintf("main must be an instance of '%1\$s'", Main::class));
            }
            $this->aData['main'] = $value;
            return;
        }
        if ($name === 'footer') {
            if (!is_object($value) || !($value instanceof Footer)) {
                throw new \UnexpectedValueException(sprintf("footer must be an instance of '%1\$s'", Footer::class));
            }
            $this->aData['footer'] = $value;
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
        if ($name === 'charset') {
            return $this->aData['charset'];
        }
        if ($name === 'favicon') {
            return $this->aData['favicon'];
        }
        if (in_array($name, [
            'fonts',
            'icons',
            'coreStyleSheets',
            'customStyleSheets',
            'coreScripts',
            'helperScripts',
            'headScripts',
            'styleSheetsOfLibs',
            'scriptsOfLibs'
        ])) {
            return $this->aData[$name];
        }
        if ($name === 'navbar') {
            return $this->aData['navbar'];
        }
        if ($name === 'sidenav') {
            return $this->aData['sidenav'];
        }
        if ($name === 'main') {
            return $this->aData['main'];
        }
        if ($name === 'footer') {
            return $this->aData['footer'];
        }
        if ($name === 'document') {
            return self::$oDocument;
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