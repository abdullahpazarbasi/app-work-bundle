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
use AppWorkBundle\Utils\Uri;

/**
 * Class TagAttribute
 */
class TagAttribute extends \DOMAttr
{
    
    /**
     * Inherited from DOMAttr:
     *
     * public readonly string $name
     * public readonly DOMElement $ownerElement
     * public readonly bool $schemaTypeInfo
     * public readonly bool $specified
     * public string $value
     * public bool isId ( void )
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
     * TagAttribute constructor
     *
     * @param string $sQualifiedName
     * @param string|int|float|boolean|null $xValue [optional]
     * @param boolean|null $bShort [optional]
     * @throws \DOMException
     * @return void
     */
    public function __construct(string $sQualifiedName, $xValue = NULL, ?bool $bShort = NULL)
    {
        $sNamespace = NULL;
        $sName = NULL;
        Uri::extractNamespaceAndNameFromQualifiedTagName($sQualifiedName, $sNamespace, $sName);
        if ($xValue !== NULL) {
            if (is_bool($xValue)) {
                if (!$xValue) {
                    throw new \DOMException("If value false then do not give this attribute");
                }
                if ($bShort) {
                    $xValue = NULL;
                }
            }
            elseif (is_scalar($xValue)) {
                $xValue = (string)$xValue;
            }
            else {
                throw new \DOMException("Invalid value");
            }
        }
        parent::__construct((empty($sNamespace) ? '' : $sNamespace . ':') . $sName, $xValue);
    }

    /**
     * @param string $sQualifiedName
     * @param string|boolean|null $xValue [optional]
     * @param boolean|null $bShort [optional]
     * @throws \DOMException
     * @return TagAttribute
     */
    public static function create(string $sQualifiedName, $xValue = NULL, ?bool $bShort = NULL): TagAttribute
    {
        return new static($sQualifiedName, $xValue, $bShort);
    }

    /**
     * @return string
     */
    public function render(): string
    {
        $sO = '';
        $sQualifiedName = $this->nodeName;
        $sNamespace = $this->prefix;
        $sLocalName = $this->localName;
        $xValue = $this->nodeValue;
        $bShort = ($xValue === NULL);
        $bBoolean = ($bShort || $xValue === $sLocalName);
        if ($bBoolean && $bShort) {
            if ($xValue) {
                $sO .= $sQualifiedName;
            }
        }
        else {
            $sO .= $sQualifiedName . '="' . self::_escapeDoubleQuotes($xValue) . '"';
        }
        return $sO;
    }

    /**
     * @param string $sInput
     * @return string
     */
    protected static function _escapeDoubleQuotes($sInput): string
    {
        return str_replace("\"", "\\\"", $sInput);
    }

}