<?php
declare(strict_types=1);

use App\Application\Middleware\SessionMiddleware;
use App\Application\Middleware\JsonBodyParserMiddleware;
use Slim\App;

return function (App $app) {
    $app->add(SessionMiddleware::class);
    $app->add(JsonBodyParserMiddleware::class);
    // $app->add(new Tuupola\Middleware\JwtAuthentication([
    //     "secret" => getenv("JWT_SECRET"),
    //     "rules" => [
    //         new Tuupola\Middleware\JwtAuthentication\RequestPathRule([
    //             "path" => "/",
    //             "ignore" => ["/users/login"]
    //         ])
    //     ]
    // ]));
    // $app->add(new Tuupola\Middleware\JwtAuthentication([
    //     "secret" => getenv("JWT_SECRET"),
    //     "rules" => [
    //         new Tuupola\Middleware\JwtAuthentication\RequestPathRule([
    //             "path" => "/chapters",
    //             "ignore" => ["/users/login"]
    //         ]),
    //         new Tuupola\Middleware\JwtAuthentication\RequestMethodRule([
    //             "ignore" => ["OPTIONS"]
    //         ])
    //     ]
    // ]));
};
