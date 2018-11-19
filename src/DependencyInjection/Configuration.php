<?php
/**
 * Copyright (c) 2018.
 */
/**
 * User: abdullah
 * Date: 19.11.2018
 * Time: 14:10
 */
namespace AppWorkBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 */
class Configuration implements ConfigurationInterface
{
    
    /**
     * Generates the configuration tree builder
     *
     * @return \Symfony\Component\Config\Definition\Builder\TreeBuilder The tree builder
     */
    public function getConfigTreeBuilder()
    {
        $oTreeBuilder = new TreeBuilder();
        //
        return $oTreeBuilder;
    }
    
}