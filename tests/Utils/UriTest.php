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
 * Class UriTest
 */
class UriTest extends TestCase
{
    
    public function testRelativePathConversion()
    {
        $sFrom = __DIR__;
        $sTo = __DIR__ . DIRECTORY_SEPARATOR . '..';
        $sResult = \AppWorkBundle\Utils\Uri::getRelativePath($sFrom, $sTo);
        $this->assertEquals($sResult, './../');
    }
    
}