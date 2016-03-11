<?php
namespace Junker\Silex\Provider;
use Silex\Application;
use Silex\ServiceProviderInterface;
use HSAL\HSAL;


class HandlerSocketServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app)
    {
        $app['hs'] = $app->share(function(Application $app) {
            $options = $app['hs.options'];
            $driver_options = isset($options['driverOptions']) ? $options['driverOptions'] : [];

            if (isset($options['driver']))
                $driverOptions['driver'] = $options['driver'];

            if (isset($options['port_read']))
                $driverOptions['port_read'] = $options['port_read'];

            if (isset($options['port_write']))
                $driverOptions['port_write'] = $options['port_write'];

            if (isset($timeout['timeout']))
                $driverOptions['timeout'] = $options['timeout'];

            $hs = new HSAL($options['host'], $options['dbname'], $driverOptions);
            
            return $hs;
        });
    }
    public function boot(Application $app)
    {
    }
}