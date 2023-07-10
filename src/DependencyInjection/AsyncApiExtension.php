<?php

namespace TinoUhlig\AsyncApiBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ChildDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use TinoUhlig\AsyncApiBundle\Attribute\Message;

class AsyncApiExtension extends Extension
{
    /**
     * @inheritDoc
     */
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new YamlFileLoader($container, new FileLocator(dirname(__DIR__) . '/../config'));
        $loader->load('services.yaml');

        $container->registerAttributeForAutoconfiguration(
            Message::class,
            static function (ChildDefinition $definition, Message $attribute, \ReflectionClass $reflector): void {
                $definition->addTag('async_api.messages');
            }
        );

        foreach ($configs as $name => $config) {
            $container->setParameter('asyncapi.' . $name, $config);
            var_dump($name, $config);
        }

    }
}
