<?php

namespace Main\controllers;

use Main\core\BaseController;
use Main\core\Session;
use Main\core\Validator;

class NoteController extends BaseController
{
    public function index()
    {

        $notes = $this->loadModel("Note")
            ->getAllNotesById(Session::get('user_id'));

        $this->renderView('Notes/Notes', compact('notes'));
    }

    public function addNewNote()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            return $this->renderView('Notes/create');
        }

        $validator = new Validator($_POST);
        $validator->required('title')->required('body');

        if ($validator->fails()) {
            Session::flash('errors', $validator->errors());
            Session::flash('old', $_POST);
            return redirect('note/add');
        }

        $this->loadModel("Note")->addNote(
            $_POST['title'],
            $_POST['body'],
            Session::get('user_id')
        );
        Session::flash('success', 'Note added successfully 🎉');
        return redirect('notes');
    }

    public function NoteById($id)
    {
        $note = $this->loadModel('Note')
            ->getNoteByIdAndUser($id, Session::get('user_id'));

        $this->renderView('Notes/show', compact('note'));
    }
    public function edit($id)
    {
        $noteModel = $this->loadModel("Note");

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $note = $noteModel->getNoteByIdAndUser($id, Session::get('user_id'));
            return $this->renderView('Notes/edit', compact('note'));
        }
    }
    public function updateNote($id)
    {
        $noteModel = $this->loadModel("Note");
        $validator = new Validator($_POST);
        $validator->required('title')->required('body');

        if ($validator->fails()) {
            Session::flash('errors', $validator->errors());
            Session::flash('old', $_POST);
            return redirect("note/$id/edit");
        }

        $noteModel->update($id, $_POST['title'], $_POST['body']);
        Session::flash('success', 'Note updated successfully ✨');
        return redirect('notes');
    }

    public function delete($id)
    {
        $noteModel = $this->loadModel("Note");
        if ($noteModel->delete($id)) {
            Session::flash('success', 'Note deleted successfully');
        } else {
            Session::flash('error', 'Failed to delete note');
        }

        return redirect('notes');
    }
}
