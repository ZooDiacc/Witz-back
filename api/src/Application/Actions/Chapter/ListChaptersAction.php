<?php
declare(strict_types=1);

namespace App\Application\Actions\Chapter;

use Psr\Http\Message\ResponseInterface as Response;

class ListChaptersAction extends ChapterAction
{
    protected function action(): Response
    {
        $allChapters = $this->chapter->all();
        return $this->respondWithData($allChapters);
    }
}
