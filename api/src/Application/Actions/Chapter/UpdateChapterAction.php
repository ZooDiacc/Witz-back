<?php
declare(strict_types=1);

namespace App\Application\Actions\Chapter;

use Psr\Http\Message\ResponseInterface as Response;
use App\Domain\Chapter\Chapter;
use App\Domain\Chapter\ChapterNotFoundException;
use App\Domain\Chapter\ChapterBadRequestException;

class UpdateChapterAction extends ChapterAction
{
    protected function action(): Response
    {
        $chapterId = (int) $this->resolveArg('id');
        $chapter = Chapter::find($chapterId);
        if (!$chapter)
            throw new ChapterNotFoundException();

        if (!isset($this->request->getParsedBody()['title']) || empty($this->request->getParsedBody()['title'])) {
            throw new ChapterBadRequestException();
        }
        if (!isset($this->request->getParsedBody()['text']) || empty($this->request->getParsedBody()['text'])) {
            throw new ChapterBadRequestException();
        }

        $chapter->title = $this->request->getParsedBody()['title'];
        $chapter->text = $this->request->getParsedBody()['text'];
        $chapter->updated_at = new \DateTime();
        $chapter->save();

        $this->logger->info("Chapter of id `${chapterId}` was updated.");

        return $this->respondWithData($chapter);
    }
}
