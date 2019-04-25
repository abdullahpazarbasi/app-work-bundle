<?php
/**
 * Copyright (c) 2018.
 */
/**
 * User: abdullah
 * Date: 30.11.2018
 * Time: 10:00
 */
namespace AppWorkBundle\Twig;

use Twig\Extension\AbstractExtension;

/**
 * Class TreeExtension
 */
class TreeExtension extends AbstractExtension
{
    
    /**
     * @return array
     */
    public function getTokenParsers(): array
    {
        return [ new TreeTokenParser() ];
    }
    
    /**
     * @return string
     */
    public function getName(): string
    {
        return 'tree';
    }
    
}