<?php
namespace Jackdaw\SilexTiny;

use Pimple\ServiceProviderInterface;
use Pimple\Container;

use League\Tiny\Tiny;

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
        $app['tiny'] = function ($app) {
            // Make sure a tiny set has been setup.
            if (! isset($app['tiny.set'])) {
                throw new \RuntimeException('You must provide a random alpha-numeric set where each character must only be used exactly once. See https://github.com/zackkitzmiller/tiny-php for more info.');
            }

            return new Tiny($app['tiny.set']);
        };
    }
}