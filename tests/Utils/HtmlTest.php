<?php
/**
 * Copyright (c) 2018.
 */

/**
 * User: abdullah
 * Date: 29.11.2018
 * Time: 10:46
 */

namespace AppWorkBundle\Tests\Utils;

use PHPUnit\Framework\TestCase;

/**
 * Class HtmlTest
 */
class HtmlTest extends TestCase
{
    
    public function testIfClassAttributeCanBeReplaced()
    {
        $sSource = '<span id="" class="old1">&nbsp;</span>';
        $sTarget = '<span id="" class="test1 test2 test3">&nbsp;</span>';
        $sResult = \AppWorkBundle\Utils\Html::replaceClassAttributeInTag($sSource, 'test1 test2 test3');
        $this->assertEquals($sResult, $sTarget);
    }
    
    public function testIfClassAttributeCanBePlaced()
    {
        $sSource = '<img src=""/>';
        $sTarget = '<img src="" class="test1 test2 test3"/>';
        $sResult = \AppWorkBundle\Utils\Html::replaceClassAttributeInTag($sSource, 'test1 test2 test3');
        $this->assertEquals($sResult, $sTarget);
    }
    
    public function testIfStyleAttributeCanBeReplaced()
    {
        $sSource = '<span id="" style="display: block;">&nbsp;</span>';
        $sTarget = '<span id="" style="display: none;">&nbsp;</span>';
        $sResult = \AppWorkBundle\Utils\Html::replaceStyleAttributeInTag($sSource, 'display: none;');
        $this->assertEquals($sResult, $sTarget);
    }
    
    public function testIfStyleAttributeCanBePlaced()
    {
        $sSource = '<img src=""/>';
        $sTarget = '<img src="" style="display: none;"/>';
        $sResult = \AppWorkBundle\Utils\Html::replaceStyleAttributeInTag($sSource, 'display: none;');
        $this->assertEquals($sResult, $sTarget);
    }
    
    public function testLocalNameAndNamespaceExtractionFromQualifiedName()
    {
        $sQualifiedName = 'namespace1:localname1';
        $sNamespace = NULL;
        $sLocalName = NULL;
        \AppWorkBundle\Utils\Html::extractNamespaceAndNameFromQualifiedName($sQualifiedName, $sNamespace, $sLocalName);
        $this->assertEquals($sQualifiedName, $sNamespace . ':' . $sLocalName);
    }
    
}