<?php

namespace Main\core\Middleware;

use Main\core\Auth;
use Main\models\Note;

class OwnsNoteMiddleware implements MiddlewareInterface
{
    private $noteId;
    private Note $noteModel;

    public function __construct($noteId)
    {
        $this->noteId = $noteId;
        $this->noteModel = new Note();
    }
    public function handle()
    {
        $note = $this->noteModel->getNoteByIdAndUser(
            $this->noteId,
            Auth::id()
        );
        if (!$note) {
            abort(403);
        }
    }
}
