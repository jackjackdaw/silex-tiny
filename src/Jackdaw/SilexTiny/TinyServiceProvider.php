<?php
namespace Jackdaw\SilexTiny;

use Pimple\ServiceProviderInterface;
use Pimple\Container;

use Jackdaw\SilexTiny\Twig\TinyExtension;
use ZackKitzmiller\Tiny;

/**
 * Silex service provider for Zack Kitzmiller's Tiny library.
 * @author jackjackdaw
 *
 */
class TinyServiceProvider implements ServiceProviderInterface
{
    /**
     * Registers services on the given container.
     *
     * This method should only be used to configure services and parameters.
     * It should not get services.
     *
     * @param Container $app A container instance
     */
    public function register(Container $app)
    {
        // Register the tiny service
        $app['tiny'] = function ($app) {
            // Make sure a tiny set has been setup.
            if (! isset($app['tiny.options']['set'])) {
                throw new \RuntimeException('You must provide a random alpha-numeric set where each character must only be used exactly once. See https://github.com/zackkitzmiller/tiny-php for more info.');
            }

            return new Tiny($app['tiny.options']['set']);
        };

        // Add the twig tiny extension.
        $app['twig'] = $app->extend('twig', function ($twig, $app) {
            // Register the tiny Twig extension.
            $twig->addExtension(new TinyExtension($app['tiny']));
            return $twig;
        });
    }
}