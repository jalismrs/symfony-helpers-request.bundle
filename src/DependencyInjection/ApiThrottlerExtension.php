<?php
declare(strict_types = 1);

namespace Jalismrs\HelpersRequestBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

/**
 * Class HelpersRequestExtension
 *
 * @package Jalismrs\HelpersRequestBundle\DependencyInjection
 */
class HelpersRequestExtension extends
    Extension
{
    /**
     * load
     *
     * @param array                                                   $configs
     * @param \Symfony\Component\DependencyInjection\ContainerBuilder $container
     *
     * @return void
     *
     * @throws \Exception
     */
    public function load(
        array $configs,
        ContainerBuilder $container
    ): void {
        $fileLocator = new FileLocator(
            __DIR__.'/../Resources/config'
        );
        
        $yamlFileLoader = new YamlFileLoader(
            $container,
            $fileLocator
        );
    
        $yamlFileLoader->load('services.yaml');
    }
}
