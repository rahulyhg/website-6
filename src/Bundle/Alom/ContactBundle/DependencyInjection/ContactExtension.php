<?php

namespace Bundle\Alom\ContactBundle\DependencyInjection;

use Symfony\Components\DependencyInjection\Extension\Extension;
use Symfony\Components\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Components\DependencyInjection\ContainerBuilder;

/**
 * Description of ContactExtension
 *
 * @author alex
 */
class ContactExtension extends Extension
{
    protected $resources = array(
        'handler' => 'handler.xml'
    );

    /**
     * Loads the handler configuration
     *
     * @param array            $config    An array of configuration settings
     * @param ContainerBuilder $container A ContainerBuilder instance
     */
    public function handlerLoad($config, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, __DIR__.'/../Resources/config');
        $loader->load($this->resources['handler']);
        foreach (array(
            'sender.name', 'sender.email',
            'notified.name', 'notified.email',
            'confirmation.subject', 'confirmation.template',
            'notification.subject', 'notification.template'
        ) as $mandatory) {
            $container->setParameter('contact.handler.'.$mandatory, $config[$mandatory]);
        }
    }

    /**
     * @inherited
     */
    public function getXsdValidationBasePath() {
        return __DIR__ . '/../Resources/config/schema';
    }

    /**
     * @inherited
     *
     * @todo Publier le DIC
     */
    public function getNamespace() {
        return null;
    }

    /**
     * @inherited
     */
    public function getAlias() {
        return 'contact';
    }
}
