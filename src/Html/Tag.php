<?php
/**
 * Copyright (c) 2018.
 */
/**
 * User: abdullah
 * Date: 22.11.2018
 * Time: 10:00
 */
namespace AppWorkBundle\Html;

use AppWorkBundle\Utils\Html;

/**
 * Class Tag
 */
class Tag extends \DOMElement
{
    
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
     * Inherited from DOMElement:
     *
     * public readonly bool $schemaTypeInfo
     * public readonly string $tagName
     *
     * public __construct ( string $name [, string $value [, string $namespaceURI ]] )
     * public string getAttribute ( string $name )
     * public DOMAttr getAttributeNode ( string $name )
     * public DOMAttr getAttributeNodeNS ( string $namespaceURI , string $localName )
     * public string getAttributeNS ( string $namespaceURI , string $localName )
     * public DOMNodeList getElementsByTagName ( string $name )
     * public DOMNodeList getElementsByTagNameNS ( string $namespaceURI , string $localName )
     * public bool hasAttribute ( string $name )
     * public bool hasAttributeNS ( string $namespaceURI , string $localName )
     * public bool removeAttribute ( string $name )
     * public bool removeAttributeNode ( DOMAttr $oldnode )
     * public bool removeAttributeNS ( string $namespaceURI , string $localName )
     * public DOMAttr setAttribute ( string $name , string $value )
     * public DOMAttr setAttributeNode ( DOMAttr $attr )
     * public DOMAttr setAttributeNodeNS ( DOMAttr $attr )
     * public void setAttributeNS ( string $namespaceURI , string $qualifiedName , string $value )
     * public void setIdAttribute ( string $name , bool $isId )
     * public void setIdAttributeNode ( DOMAttr $attr , bool $isId )
     * public void setIdAttributeNS ( string $namespaceURI , string $localName , bool $isId )
     */
    
    /**
     * Inherited from DOMNode:
     *
     * public readonly string $nodeName
     * public string $nodeValue
     * public readonly int $nodeType
     * public readonly DOMNode $parentNode
     * public readonly DOMNodeList $childNodes
     * public readonly DOMNode $firstChild
     * public readonly DOMNode $lastChild
     * public readonly DOMNode $previousSibling
     * public readonly DOMNode $nextSibling
     * public readonly DOMNamedNodeMap $attributes
     * public readonly DOMDocument $ownerDocument
     * public readonly string $namespaceURI
     * public string $prefix
     * public readonly string $localName
     * public readonly string $baseURI
     * public string $textContent
     *
     * public DOMNode DOMNode::appendChild ( DOMNode $newnode )
     * public string DOMNode::C14N ([ bool $exclusive [, bool $with_comments [, array $xpath [, array $ns_prefixes ]]]] )
     * public int DOMNode::C14NFile ( string $uri [, bool $exclusive = FALSE [, bool $with_comments = FALSE [, array $xpath [, array $ns_prefixes ]]]] )
     * public DOMNode DOMNode::cloneNode ([ bool $deep ] )
     * public int DOMNode::getLineNo ( void )
     * public string DOMNode::getNodePath ( void )
     * public bool DOMNode::hasAttributes ( void )
     * public bool DOMNode::hasChildNodes ( void )
     * public DOMNode DOMNode::insertBefore ( DOMNode $newnode [, DOMNode $refnode ] )
     * public bool DOMNode::isDefaultNamespace ( string $namespaceURI )
     * public bool DOMNode::isSameNode ( DOMNode $node )
     * public bool DOMNode::isSupported ( string $feature , string $version )
     * public string DOMNode::lookupNamespaceUri ( string $prefix )
     * public string DOMNode::lookupPrefix ( string $namespaceURI )
     * public void DOMNode::normalize ( void )
     * public DOMNode DOMNode::removeChild ( DOMNode $oldnode )
     * public DOMNode DOMNode::replaceChild ( DOMNode $newnode , DOMNode $oldnode )
     */

    /**
     * Tag constructor
     *
     * @param Document $oDocument
     * @param string $sQualifiedName (with namespace)
     * @param array $aoAttribute [optional]
     * @param Tag|string|null $xInnerContent [optional]
     * @param string|null $sNamespaceUri [optional]
     * @throws \DOMException
     * @return void
     */
    public function __construct(
        Document $oDocument,
        string $sQualifiedName,
        array $aoAttribute = [],
        $xInnerContent = NULL,
        ?string $sNamespaceUri = NULL
    )
    {
        $sNamespace = NULL;
        $sName = NULL;
        Html::extractNamespaceAndNameFromQualifiedName($sQualifiedName, $sNamespace, $sName);
        if ($sNamespace !== NULL) {
            $sRegisteredNamespaceUri = $oDocument->lookupNamespaceUri($sNamespace);
            if ($sRegisteredNamespaceUri === NULL && $sNamespaceUri === NULL) {
                throw new \DOMException(sprintf(
                    "Namespace URI of '%s' has not been defined",
                    (string)$sNamespace
                ));
            }
        }
        $sInnerText = NULL;
        $oChild = NULL;
        if ($xInnerContent !== NULL) {
            if (is_string($xInnerContent)) {
                if ($xInnerContent === strip_tags($xInnerContent)) {
                    $sInnerText = $xInnerContent;
                }
                else {
                    $oChild = $oDocument->createDocumentFragment();
                    $oChild->appendXML($xInnerContent);
                }
            }
            elseif ($xInnerContent instanceof Tag) {
                $oChild = $xInnerContent;
            }
            else {
                throw new \DOMException("Given inner content has not valid type");
            }
        }
        parent::__construct($sName, $sInnerText, $sNamespaceUri);
        self::paintTag($this, $oDocument);
        if ($oChild !== NULL) {
            $this->appendChild($oChild);
        }
        $this->setAttributeNodes($aoAttribute);
    }

    /**
     * @param Document $oDocument
     * @param string|null $sQualifiedName [optional]
     * @param array $aoAttribute [optional]
     * @param Tag|string|null $xInnerContent [optional]
     * @param string|null $sNamespaceUri [optional]
     * @throws \DOMException
     * @return Tag
     */
    public static function generate(
        Document $oDocument,
        ?string $sQualifiedName = NULL,
        array $aoAttribute = [],
        $xInnerContent = NULL,
        ?string $sNamespaceUri = NULL
    )
    {
        return new static($oDocument, $sQualifiedName, $aoAttribute, $xInnerContent, $sNamespaceUri);
    }

    /**
     * Used for setting innerHTML like it's done in JavaScript:
     * @code
     * $div->innerHTML = '<h2>Chapter 2</h2><p>The story begins...</p>';
     * @endcode
     *
     * @param string $name
     * @param mixed $value
     * @throws \DOMException
     * @return void
     */
    public function __set($name, $value)
    {
        if ($name == 'innerHTML') {
            $this->setInnerContent($value);
            return;
        }
        $aBackTrace = debug_backtrace();
        throw new \DOMException(sprintf(
            "Undefined property: %s in %s on line %s",
            (string)$name,
            (string)$aBackTrace[0]['file'],
            (string)$aBackTrace[0]['line']
        ));
    }

    /**
     * Usage:
     * @code
     * $string = $div->innerHTML;
     * @endcode
     *
     * @param string $name
     * @throws \DOMException
     * @return mixed
     */
    public function __get($name)
    {
        if ($name == 'innerHTML') {
            return $this->getInnerContent();
        }
        $sNamespace = NULL;
        $sName = NULL;
        Html::extractNamespaceAndNameFromQualifiedName($name, $sNamespace, $sName);
        if ($sNamespace === NULL) {
            if ($this->hasAttribute($sName)) {
                return $this->getAttribute($sName);
            }
        }
        else {
            $sRegisteredNamespaceUri = $this->ownerDocument->lookupNamespaceUri($sNamespace);
            if ($sRegisteredNamespaceUri === NULL) {
                throw new \DOMException(sprintf(
                    "Namespace URI of '%s' has not been defined",
                    (string)$sNamespace
                ));
            }
            if ($this->hasAttributeNS($sRegisteredNamespaceUri, $sName)) {
                return $this->getAttributeNS($sRegisteredNamespaceUri, $sName);
            }
        }
        $aBackTrace = debug_backtrace();
        throw new \DOMException(sprintf(
            "Undefined property: %s in %s on line %s",
            (string)$name,
            (string)$aBackTrace[0]['file'],
            (string)$aBackTrace[0]['line']
        ));
    }
    
    /**
     * @param array|\ArrayAccess $aoAttribute
     * @throws \DOMException
     * @return Tag
     */
    final public function setAttributeNodes($aoAttribute)
    {
        if (!(is_array($aoAttribute) || (is_object($aoAttribute) && $aoAttribute instanceof \Iterator))) {
            throw new \DOMException("Attribute must be a TagAttribute");
        }
        /** @var TagAttribute $oAttribute */
        foreach ($aoAttribute as $oAttribute) {
            if (!($oAttribute instanceof TagAttribute)) {
                throw new \DOMException("Each attribute must be a TagAttribute");
            }
            $this->setAttributeNode($oAttribute);
        }
        return $this;
    }
    
    /**
     * @return Tag
     */
    final public function clearInnerContent(): Tag
    {
        for ($i = $this->childNodes->length - 1; $i >= 0; $i--) {
            $this->removeChild($this->childNodes->item($i));
        }
        return $this;
    }

    /**
     * @param string $sInnerContent
     * @return Tag
     */
    public function setInnerContent($sInnerContent)
    {
        $this->clearInnerContent();
        // $sInnerContent holds our new inner HTML
        if (is_string($sInnerContent) && $sInnerContent !== '') {
            $oDocumentFragment = $this->ownerDocument->createDocumentFragment();
            // appendXML() expects well-formed markup (XHTML)
            $bSuccessful = @$oDocumentFragment->appendXML($sInnerContent); // @ to suppress PHP warnings
            if ($bSuccessful) {
                if ($oDocumentFragment->hasChildNodes()) {
                    $this->appendChild($oDocumentFragment);
                }
            }
            else {
                // $sInnerContent is probably ill-formed
                $oDocument = new \DOMDocument();
                $sInnerContent = mb_convert_encoding($sInnerContent, 'HTML-ENTITIES', 'UTF-8');
                // Using <htmlfragment> will generate a warning, but so will bad HTML
                // (and by this point, bad HTML is what we've got).
                // We use it (and suppress the warning) because an HTML fragment will
                // be wrapped around <html><body> tags which we don't really want to keep.
                // Note: despite the warning, if loadHTML succeeds it will return true.
                $bSuccessful = @$oDocument->loadHTML('<htmlfragment>' . $sInnerContent . '</htmlfragment>');
                if ($bSuccessful) {
                    $oImportedElement = $oDocument->getElementsByTagName('htmlfragment')->item(0);
                    foreach ($oImportedElement->childNodes as $oCurrentChild) {
                        $oImportedNode = $this->ownerDocument->importNode($oCurrentChild, TRUE);
                        $this->appendChild($oImportedNode);
                    }
                }
                else {
                    // oh well, we tried, we really did. :(
                    // this element is now empty
                }
            }
        }
        return $this;
    }

    /**
     * @return string|null
     */
    public function getInnerContent(): ?string
    {
        if (!$this->hasChildNodes()) {
            return NULL;
        }
        $sInnerContent = '';
        foreach ($this->childNodes as $oCurrentChild) {
            $sInnerContent .= $this->ownerDocument->saveXML($oCurrentChild);
        }
        return $sInnerContent;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->render();
    }

    /**
     * @param string $sPrefix [optional]
     * @param string $sSuffix [optional]
     * @return string
     */
    public function renderAttributes(string $sPrefix = '', string $sSuffix = ''): string
    {
        $sO = '';
        /** @var TagAttribute $oCurrentAttribute */
        foreach ($this->attributes as $oCurrentAttribute) {
            if ($sO !== '') {
                $sO .= ' ';
            }
            if ($sO === '') {
                $sO .= $sPrefix;
            }
            $sO .= $oCurrentAttribute->render();
        }
        $sO .= $sSuffix;
        return $sO;
    }

    /**
     * @return string
     */
    public function render(): string
    {
        $sO = $this->ownerDocument->saveHTML($this);
        return $sO;
    }
    
    /**
     * @param Tag $oTag
     * @param Document $oDocument
     * @return void
     */
    final public static function paintTag(Tag $oTag, Document $oDocument): void
    {
        $oDocumentFragment = $oDocument->createDocumentFragment();
        $oDocumentFragment->appendChild($oTag);
        $oDocumentFragment->removeChild($oTag);
    }

}