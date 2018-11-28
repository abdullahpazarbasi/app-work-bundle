<?php
/**
 * Copyright (c) 2018.
 */
/**
 * User: abdullah
 * Date: 19.11.2018
 * Time: 10:22
 */
namespace AppWorkBundle\Utils;

/**
 * Class Uri
 */
class Uri
{
    
    /**
     * @param string $sFrom
     * @param string $sTo
     * @return string
     */
    public static function getRelativePath($sFrom, $sTo)
    {
        $sCharList = "/";
        if (DIRECTORY_SEPARATOR === "\\") {
            $sCharList .= "\\";
        }
        $sFrom = is_dir($sFrom) ? rtrim($sFrom, $sCharList) . '/' : $sFrom;
        $sTo = is_dir($sTo) ? rtrim($sTo, $sCharList) . '/' : $sTo;
        //
        $sFrom = str_replace("\\", "/", $sFrom);
        $sTo = str_replace("\\", "/", $sTo);
        $aFrom = explode("/", $sFrom);
        $aTo = explode("/", $sTo);
        $aRelativePath = $aTo;
        foreach ($aFrom as $iDepth => $sDirectory) {
            if ($sDirectory === $aTo[$iDepth]) {
                array_shift($aRelativePath);
            }
            else {
                $iRemainingDepths = count($aFrom) - $iDepth;
                if ($iRemainingDepths > 1) {
                    $iPadLength = (count($aRelativePath) + $iRemainingDepths - 1) * -1;
                    $aRelativePath = array_pad($aRelativePath, $iPadLength, '..');
                    break;
                }
                else {
                    $aRelativePath[0] = './' . $aRelativePath[0];
                }
            }
        }
        return implode('/', $aRelativePath);
    }
    
    /**
     * @param string $sQualifiedName
     * @param string $psNamespace
     * @param string $psName
     * @return void
     */
    public static function extractNamespaceAndNameFromQualifiedTagName($sQualifiedName, &$psNamespace, &$psName)
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
    
}