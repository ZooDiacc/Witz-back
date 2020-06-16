<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Monolog\Logger;

return function (ContainerBuilder $containerBuilder) {
    // Global Settings Object
    $containerBuilder->addDefinitions([
        'settings' => [
            'displayErrorDetails' => true, // Should be set to false in production
            'logger' => [
                'name' => 'slim-app',
                'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
                'level' => Logger::DEBUG,
            ],
            'db' => [
                'driver' => 'mysql',
                'host' => '0.0.0.0',
                'port' => '3306',
                'database' => 'test',
                'username' => 'root',
                'password' => '',
                // 'host' => env('DB_HOST', '0.0.0.0'),
                // 'port' => env('DB_PORT', '3306'),
                // 'database' => env('DB_DATABASE', 'test'),
                // 'username' => env('DB_USERNAME', 'root'),
                // 'password' => env('DB_PASSWORD', ''),
                'charset' => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'prefix' => '',
            ]
        ],
    ]);
};
