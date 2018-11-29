<?php
/**
 * Copyright (c) 2018.
 */
/**
 * User: abdullah
 * Date: 29.11.2018
 * Time: 10:45
 */
namespace AppWorkBundle\Utils;

/**
 * Class Html
 */
class Html
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
     * @param string $sClasses
     * @return array
     */
    public static function getClassAttributeContentAsArray(string $sClasses): array
    {
        $aO = [];
        if (strlen($sClasses) > 0) {
            $aO = preg_split('/\s+/', $sClasses);
        }
        return array_unique($aO);
    }
    
    /**
     * @param string $sClasses
     * @param string $sClass
     * @param int $iInsertMode
     * @param null|string $sReferenceClass
     * @throws \InvalidArgumentException
     * @return string
     */
    public static function addClassIntoClassAttributeContent(
        string $sClasses,
        string $sClass,
        int $iInsertMode = self::AFTER,
        ?string $sReferenceClass = NULL
    ): string
    {
        if (!in_array($iInsertMode, self::$aInsertModes)) {
            throw new \InvalidArgumentException("Invalid insert mode");
        }
        if ($sReferenceClass === $sClass) {
            throw new \InvalidArgumentException("Reference class and class which will be added are the same");
        }
        $aNewClasses = [];
        $aOldClasses = self::getClassAttributeContentAsArray($sClasses);
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
        return implode(' ', $aNewClasses);
    }
    
    /**
     * @param string $sSourceClasses
     * @param string $sTargetClasses
     * @param int $iInsertMode
     * @param null|string $sReferenceClass
     * @throws \InvalidArgumentException
     * @return string
     */
    public static function addClassAttributeContentIntoClassAttributeContent(
        string $sSourceClasses,
        string $sTargetClasses,
        int $iInsertMode = self::AFTER,
        ?string $sReferenceClass = NULL
    ): string
    {
        $aSourceClasses = self::getClassAttributeContentAsArray($sSourceClasses);
        foreach ($aSourceClasses as $sSourceClass) {
            $sTargetClasses = self::addClassIntoClassAttributeContent($sTargetClasses, $sSourceClass, $iInsertMode, $sReferenceClass);
        }
        return $sTargetClasses;
    }
    
    /**
     * @param string $sClasses
     * @param string $sClass
     * @return string
     */
    public static function removeClassFromClassAttributeContent(string $sClasses, string $sClass): string
    {
        $aNewClasses = [];
        $aOldClasses = self::getClassAttributeContentAsArray($sClasses);
        foreach ($aOldClasses as $sCurrentClass) {
            if ($sCurrentClass !== $sClass) {
                $aNewClasses[] = $sCurrentClass;
            }
        }
        return implode(' ', $aNewClasses);
    }
    
    /**
     * @param string $sQualifiedName
     * @param string $psNamespace
     * @param string $psName
     * @return void
     */
    public static function extractNamespaceAndNameFromQualifiedName($sQualifiedName, &$psNamespace, &$psName)
    {
        if (!is_string($sQualifiedName)) {
            return;
        }
        if (strlen($sQualifiedName) < 1) {
            return;
        }
        $aPortions = array_map('trim', explode(':', $sQualifiedName));
        $psName = array_pop($aPortions);
        $sNamespace = implode(':', array_filter($aPortions, function ($xI) {
            return is_string($xI) && strlen($xI) > 0;
        }));
        $psNamespace = (strlen($sNamespace) > 0) ? $sNamespace : NULL;
    }
    
    /**
     * @param string $sInput
     * @param string $sClasses
     * @param bool $bMix
     * @return string
     */
    public static function replaceClassAttributeInTag(string $sInput, string $sClasses, bool $bMix = FALSE): string
    {
        $iCounter = 0;
        $sOutput = preg_replace_callback(
            '/(<[a-z](?:(?:_|\-)?[a-z0-9]+)*(?:\s+[a-zA-Z](?:(?:_|\-)?[a-zA-Z0-9]+)*(?:="[^"]*")?)*\s+class=")([^"]*)("(?:\s+[a-zA-Z](?:(?:_|\-)?[a-zA-Z0-9]+)*(?:="[^"]*")?)*(?:\s*\/)?>)/',
            function ($aMatches) use ($sClasses, $bMix) {
                return
                $aMatches[1]
                . ($bMix ? self::addClassAttributeContentIntoClassAttributeContent($sClasses, $aMatches[2]) : $sClasses)
                . $aMatches[3]
                ;
            },
            $sInput,
            1,
            $iCounter
        );
        if ($iCounter === 0) {
            $sOutput = preg_replace(
                '/(<[a-z](?:(?:_|\-)?[a-z0-9]+)*(?:\s+[a-zA-Z](?:(?:_|\-)?[a-zA-Z0-9]+)*(?:="[^"]*")?)*)((?:\s*\/)?>)/',
                '${1}' . sprintf(' class="%s"', $sClasses) . '${2}',
                $sInput,
                1,
                $iCounter
            );
        }
        return $sOutput;
    }
    
    /**
     * @param string $sInput
     * @param string $sInlineStyle
     * @param bool $bMix todo: add this feature
     * @return string
     */
    public static function replaceStyleAttributeInTag(string $sInput, string $sInlineStyle, bool $bMix = FALSE): string
    {
        $iCounter = 0;
        $sOutput = preg_replace(
            '/(<[a-z](?:(?:_|\-)?[a-z0-9]+)*(?:\s+[a-zA-Z](?:(?:_|\-)?[a-zA-Z0-9]+)*(?:="[^"]*")?)*\s+style=")([^"]*)("(?:\s+[a-zA-Z](?:(?:_|\-)?[a-zA-Z0-9]+)*(?:="[^"]*")?)*(?:\s*\/)?>)/',
            '${1}' . $sInlineStyle . '${3}',
            $sInput,
            1,
            $iCounter
        );
        if ($iCounter === 0) {
            $sOutput = preg_replace(
                '/(<[a-z](?:(?:_|\-)?[a-z0-9]+)*(?:\s+[a-zA-Z](?:(?:_|\-)?[a-zA-Z0-9]+)*(?:="[^"]*")?)*)((?:\s*\/)?>)/',
                '${1}' . sprintf(' style="%s"', $sInlineStyle) . '${2}',
                $sInput,
                1,
                $iCounter
            );
        }
        return $sOutput;
    }
    
}