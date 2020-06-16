<?php
declare(strict_types=1);

namespace App\Application\Actions\Chapter;

use Psr\Http\Message\ResponseInterface as Response;
use App\Domain\Chapter\Chapter;
use App\Domain\Chapter\ChapterBadRequestException;

class CreateChapterAction extends ChapterAction
{
    protected function action(): Response
    {
        $this->logger->info("Create chapter");

        $chapter = new Chapter;

        if (!isset($this->request->getParsedBody()['title']) || empty($this->request->getParsedBody()['title'])) {
            throw new ChapterBadRequestException();
        }
        if (!isset($this->request->getParsedBody()['text']) || empty($this->request->getParsedBody()['text'])) {
            throw new ChapterBadRequestException();
        }
        
        $chapter->title = $this->request->getParsedBody()['title'];
        $chapter->text = $this->request->getParsedBody()['text'];
        $chapter->save();

        return $this->respondWithData($chapter, 201);
    }
}
