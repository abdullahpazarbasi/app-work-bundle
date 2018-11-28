<?php
/**
 * Copyright (c) 2018.
 */
/**
 * User: abdullah
 * Date: 23.11.2018
 * Time: 11:53
 */
namespace AppWorkBundle\Twig;

use AppWorkBundle\Theme\Theme;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Twig_Extension;
use Twig_SimpleFunction;

/**
 * Class ThemeExtension
 */
final class ThemeExtension extends Twig_Extension
{
    
    use ContainerAwareTrait;
    
    /**
     * {@inheritDoc}
     */
    public function getFunctions(): array
    {
        $aOptions = [];
        return [
            new Twig_SimpleFunction('theme', [ $this, 'themeFunction' ], $aOptions)
        ];
    }
    
    /**
     * @return Theme
     */
    public function themeFunction(): Theme
    {
        return $this->container->get('appwork.theme');
    }
    
    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'theme';
    }
    
}