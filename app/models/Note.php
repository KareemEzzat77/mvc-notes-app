<?php

namespace Main\models;

use Main\core\BaseModel;

// Define a class named Book this will be the Book model
class Note extends BaseModel
{
    public function getAllNotesById($user_id)
    {
        $this->query("SELECT * FROM note where user_id = :user_id");
        $this->bind(':user_id', $user_id);
        // Execute the prepared query
        $this->execute();
        // Return the results of the query
        return $this->all();
    }

    public function addNote($title, $body, $user_id)
    {
        $this->query("INSERT INTO note (body, title, user_id) VALUES (:body, :title, :user_id)");
        // Bind the isbn parameter to the query
        $this->bind(':body', $body);
        $this->bind(':user_id', $user_id);
        // Bind the title parameter to the query
        $this->bind(':title', $title);
        // Execute the prepared query
        return $this->execute();
    }
    public function update($id, $title, $body)
    {
        $this->query("UPDATE note SET title=:title, body=:body WHERE id=:id");
        // Bind the title parameter to the query
        $this->bind(':title', $title);
        // Bind the author parameter to the query
        $this->bind(':body', $body);
        // Bind the id parameter to the query
        $this->bind(':id', $id);
        // Execute the prepared query
        return $this->execute();
    }
    public function delete($id)
    {
        $this->query("DELETE FROM note WHERE id = :id");
        $this->bind(':id', $id);
        return $this->execute();
    }
    public function getNoteByIdAndUser($id, $userId)
    {
        $this->query("SELECT * FROM note WHERE id = :id AND user_id = :userId");
        $this->bind(':id', $id);
        $this->bind(':userId', $userId);
        return $this->one();
    }
}
