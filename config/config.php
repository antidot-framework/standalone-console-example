<?php


declare(strict_types=1);


use App\Console\SomeCommandClass;
use Zend\ConfigAggregator\ArrayProvider;
use Zend\ConfigAggregator\ConfigAggregator;

$cliConfig = [
    'config_cache_path' => 'var/cache/config-cache.php',
    'dependencies' => [
        'invokables' => [
            SomeCommandClass::class => SomeCommandClass::class
        ]
    ],
    'console' => [
        'commands' => [
            'some:command:name' => SomeCommandClass::class
        ]
    ]
];

$aggregator = new ConfigAggregator([
    \Antidot\Cli\Container\Config\ConfigProvider::class,
    new ArrayProvider($cliConfig),
], $cliConfig['config_cache_path']);
return $aggregator->getMergedConfig();
