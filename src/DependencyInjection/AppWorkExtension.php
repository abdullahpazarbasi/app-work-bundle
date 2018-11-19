<?php
/**
 * Copyright (c) 2018.
 */
/**
 * User: abdullah
 * Date: 19.11.2018
 * Time: 14:13
 */
namespace AppWorkBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader;

/**
 * Class AppWorkExtension
 */
class AppWorkExtension extends Extension implements ExtensionInterface
{
    
    /**
     * @var ContainerBuilder
     */
    protected $oContainer;
    
    /**
     * Loads the configuration
     *
     * @param array            $aConfigurations An array of configuration settings
     * @param ContainerBuilder $oContainer      A ContainerBuilder instance
     * @throws \Exception
     */
    public function load(array $aConfigurations, ContainerBuilder $oContainer)
    {
        $this->oContainer = $oContainer;
        $oLoader = new Loader\YamlFileLoader(
            $oContainer,
            new FileLocator(__DIR__ . '/../Resources/config')
        );
        $oLoader->load('services.yml');
    }
    
}