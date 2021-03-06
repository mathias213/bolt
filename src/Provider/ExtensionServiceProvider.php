<?php

namespace Bolt\Provider;

use Bolt\Extensions;
use Silex\Application;
use Silex\ServiceProviderInterface;
use Bolt\Extensions\StatService;

class ExtensionServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['extensions'] = $app->share(
            function ($app) {
                $extensions = new Extensions($app);

                return $extensions;
            }
        );

        $app['extensions.stats'] = $app->share(
            function ($app) {
                $stats = new StatService($app);

                return $stats;
            }
        );

    }

    public function boot(Application $app)
    {
    }
}
