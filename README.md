# HandlerSocketServiceProvider
HandlerSocket Service Provider for Silex 

## Requirements
silex 1.x

##Installation
The best way to install HandlerSocketServiceProvider is to use a [Composer](https://getcomposer.org/download):

    php composer.phar require junker/handlersocket-service-provider

## Examples

```php
use HSAL\HSAL;
use Junker\Silex\Provider\HandlerSocketServiceProvider;

$app->register(new HandlerSocketServiceProvider(), [
    'hs.options' => [
        'host' => 'localhost',
        'dbname' => 'testdb'
    ]
]);

# or

$app->register(new HandlerSocketServiceProvider(), [
    'hs.options' => [
        'host' => 'localhost',
        'dbname' => 'testdb',
        'port_read' => 9998,
        'port_write' => 9999,
        'timeout' => 5
    ]
]);


$page = $app['hs'] = $hs->fetchAssoc('pages', ['id', 'title'], [HSAL::INDEX_PRIMARY => 5]);

```

## Documentation

[HSAL Documentation](https://github.com/Junker/HSAL)