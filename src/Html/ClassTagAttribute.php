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

/**
 * Class ClassTagAttribute
 */
class ClassTagAttribute
{
    
    const BEFORE = 1;
    const AFTER = 2;
    
    /**
     * @var array
     */
    protected static $aInsertModes = [
        self::BEFORE,
        self::AFTER
    ];
    
    /**
     * @var TagAttribute
     */
    protected $oTagAttribute;
    
    /**
     * HtmlClass constructor
     *
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
    public function addClass(string $sClass, int $iInsertMode = self::AFTER, ?string $sReferenceClass = NULL)
    {
        if (!in_array($iInsertMode, self::$aInsertModes)) {
            throw new \InvalidArgumentException("Invalid insert mode");
        }
        if ($sReferenceClass === $sClass) {
            throw new \InvalidArgumentException("Reference class and class which will be added are the same");
        }
        $aNewClasses = [];
        $aOldClasses = $this->getClassesAsArray();
        $bAdded = FALSE;
        foreach ($aOldClasses as $sCurrentClass) {
            if ($sCurrentClass === $sReferenceClass) {
                if ($iInsertMode === self::BEFORE) { // if BEFORE
                    $aNewClasses[] = $sClass;
                    $bAdded = TRUE;
                    $aNewClasses[] = $sReferenceClass;
                }
                else { // if AFTER
                    $aNewClasses[] = $sReferenceClass;
                    $aNewClasses[] = $sClass;
                    $bAdded = TRUE;
                }
            }
            elseif ($sReferenceClass === NULL && $sCurrentClass === $sClass) {
                $aNewClasses[] = $sClass;
                $bAdded = TRUE;
            }
            else {
                if ($sCurrentClass !== $sClass) {
                    $aNewClasses[] = $sCurrentClass;
                }
            }
        }
        if (!$bAdded) {
            $aNewClasses[] = $sClass;
            $bAdded = TRUE;
        }
        $this->oTagAttribute->value = implode(' ', $aNewClasses);
        return $this;
    }
    
    /**
     * @param string $sClass
     * @return static
     */
    public function removeClass(string $sClass)
    {
        $aNewClasses = [];
        $aOldClasses = $this->getClassesAsArray();
        foreach ($aOldClasses as $sCurrentClass) {
            if ($sCurrentClass !== $sClass) {
                $aNewClasses[] = $sCurrentClass;
            }
        }
        $this->oTagAttribute->value = implode(' ', $aNewClasses);
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
        $aO = [];
        $sClasses = $this->oTagAttribute->value;
        if (strlen($sClasses) > 0) {
            $aO = preg_split('/\s+/', $sClasses);
        }
        return array_unique($aO);
    }
    
}