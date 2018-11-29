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
 * Class DivTag
 */
class DivTag extends Tag
{
    
    /**
     * @param Document $oDocument
     * @param string|null $sTextContent
     * @throws \DOMException
     * @return void
     */
    public function __construct(Document $oDocument, ?string $sTextContent = NULL)
    {
        parent::__construct($oDocument, 'div', [], $sTextContent, NULL);
    }
    
    /**
     * @param Document $oDocument
     * @param string|null $sTextContent
     * @throws \DOMException
     * @return DivTag
     */
    public static function create(Document $oDocument, ?string $sTextContent = NULL): DivTag
    {
        return new static($oDocument, $sTextContent);
    }
    
    /**
     * @return string|null
     */
    public function getTextContent()
    {
        return $this->getInnerContent();
    }
    
    /**
     * @param string|null $sTextContent
     * @return static
     */
    public function setTextContent($sTextContent)
    {
        $this->setInnerContent($sTextContent);
        return $this;
    }
    
}