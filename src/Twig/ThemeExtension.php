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
use AppWorkBundle\Utils\Html;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

/**
 * Class ThemeExtension
 */
final class ThemeExtension extends AbstractExtension
{
    
    use ContainerAwareTrait;
    
    /**
     * {@inheritDoc}
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('theme', [ $this, 'themeFunction' ])
        ];
    }
    
    /**
     * {@inheritDoc}
     */
    public function getFilters(): array
    {
        return [
            new TwigFilter('class', [ $this, 'classFilter' ]),
            new TwigFilter('style', [ $this, 'styleFilter' ]),
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
     * @param string $sInput
     * @param string $sClasses
     * @param bool $bMix
     * @return string
     */
    public function classFilter(string $sInput, string $sClasses, bool $bMix = FALSE): string
    {
        return Html::replaceClassAttributeInTag($sInput, $sClasses, $bMix);
    }
    
    /**
     * @param string $sInput
     * @param string $sInlineStyle
     * @param bool $bMix
     * @return string
     */
    public function styleFilter(string $sInput, string $sInlineStyle, bool $bMix = FALSE): string
    {
        return Html::replaceStyleAttributeInTag($sInput, $sInlineStyle, $bMix);
    }
    
}