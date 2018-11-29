<?php
/**
 * Copyright (c) 2018.
 */
/**
 * User: abdullah
 * Date: 27.11.2018
 * Time: 10:29
 */
namespace AppWorkBundle\Html;

use AppWorkBundle\Utils\Html;

/**
 * Class ClassTagAttribute
 */
class ClassTagAttribute
{
    
    /**
     * @var TagAttribute
     */
    protected $oTagAttribute;
    
    /**
     * @param \DOMNode $oNode ( Tag | TagAttribute )
     * @throws \DOMException
     * @return void
     */
    public function __construct(\DOMNode $oNode)
    {
        if ($oNode instanceof Tag) {
            /** @var Tag $oNode */
            if ($oNode->hasAttribute('class')) {
                $this->oTagAttribute = $oNode->getAttributeNode('class');
                return;
            }
            else {
                $oNode = new TagAttribute('class', '');
            }
        }
        if ($oNode instanceof TagAttribute) {
            if ($oNode->localName !== 'class') {
                throw new \UnexpectedValueException("Node is not a class tag attribute");
            }
            $this->oTagAttribute = $oNode;
            $this->oTagAttribute->value = implode(' ', $this->getClassesAsArray());
            return;
        }
        throw new \InvalidArgumentException(sprintf(
            "Node must be a %1\$s or a %2\$s",
            Tag::class,
            TagAttribute::class
        ));
    }
    
    /**
     * @param string $sClass
     * @param int $iInsertMode
     * @param string|null $sReferenceClass
     * @throws \InvalidArgumentException
     * @return static
     */
    public function addClass(string $sClass, int $iInsertMode = Html::AFTER, ?string $sReferenceClass = NULL)
    {
        $this->oTagAttribute->value = Html::addClassIntoClassAttributeContent(
            $this->oTagAttribute->value,
            $sClass,
            $iInsertMode,
            $sReferenceClass
        );
        return $this;
    }
    
    /**
     * @param string $sClass
     * @return static
     */
    public function removeClass(string $sClass)
    {
        $this->oTagAttribute->value = Html::removeClassFromClassAttributeContent($this->oTagAttribute->value, $sClass);
        return $this;
    }
    
    /**
     * @param string $sClass
     * @return bool
     */
    public function hasClass(string $sClass): bool
    {
        $aClasses = $this->getClassesAsArray();
        return in_array($sClass, $aClasses, TRUE);
    }
    
    /**
     * @return string
     */
    public function getClasses(): string
    {
        return $this->oTagAttribute->value;
    }
    
    /**
     * @return array
     */
    protected function getClassesAsArray(): array
    {
        return Html::getClassAttributeContentAsArray($this->oTagAttribute->value);
    }
    
}