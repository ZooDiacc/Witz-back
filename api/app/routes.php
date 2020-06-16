<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use App\Application\Actions\User\LoginUserAction;
use App\Application\Actions\Chapter\ListChaptersAction;
use App\Application\Actions\Chapter\ViewChapterAction;
use App\Application\Actions\Chapter\CreateChapterAction;
use App\Application\Actions\Chapter\DeleteChapterAction;
use App\Application\Actions\Chapter\UpdateChapterAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
        $group->post('/login', LoginUserAction::class);
    });

    $app->group('/chapters', function (Group $group) {
        $group->get('', ListChaptersAction::class);
        $group->get('/{id}', ViewChapterAction::class);
        $group->post('', CreateChapterAction::class);
        $group->delete('/{id}', DeleteChapterAction::class);
        $group->put('/{id}', UpdateChapterAction::class);
    });
};
