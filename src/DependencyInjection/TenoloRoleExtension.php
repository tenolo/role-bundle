<?php

namespace Tenolo\Bundle\RoleBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\ConfigurableExtension;
use Tenolo\Bundle\RoleBundle\Entity\Entities\Role;
use Tenolo\Bundle\RoleBundle\Entity\Interfaces\RoleInterface;

/**
 * Class TenoloRoleExtension
 *
 * @package Tenolo\Bundle\RoleBundle\DependencyInjection
 * @author  Nikita Loges
 * @company tenolo GbR
 */
class TenoloRoleExtension extends ConfigurableExtension implements PrependExtensionInterface
{

    /**
     * @inheritdoc
     */
    public function loadInternal(array $config, ContainerBuilder $container)
    {
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.yml');
    }

    /**
     * @inheritDoc
     */
    public function prepend(ContainerBuilder $container)
    {
        $doctrine = [
            'orm' => [
                'resolve_target_entities' => [
                    RoleInterface::class => Role::class,
                ]
            ]
        ];

        $container->prependExtensionConfig('doctrine', $doctrine);
    }
}
