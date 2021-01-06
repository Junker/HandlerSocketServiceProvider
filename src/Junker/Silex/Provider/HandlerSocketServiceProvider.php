<?php
namespace Junker\Silex\Provider;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use HSAL\HSAL;


class HandlerSocketServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['hs'] = function($app) {
            $options = $app['hs.options'];
            $driverOptions = isset($options['driverOptions']) ? $options['driverOptions'] : [];

            if (isset($options['driver']))
                $driverOptions['driver'] = $options['driver'];

            if (isset($options['port_read']))
                $driverOptions['port_read'] = $options['port_read'];

            if (isset($options['port_write']))
                $driverOptions['port_write'] = $options['port_write'];

            if (isset($options['timeout']))
                $driverOptions['timeout'] = $options['timeout'];

            if (isset($options['rw_timeout']))
                $driverOptions['rw_timeout'] = $options['rw_timeout'];

            $hs = new HSAL($options['host'], $options['dbname'], $driverOptions);

            return $hs;
        };
    }
}
