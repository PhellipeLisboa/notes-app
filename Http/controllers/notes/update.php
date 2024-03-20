<?php 

use Core\Database;
use Core\App;
use Core\Validator;


$db = App::resolve(Database::class);


$currentUserId = $_SESSION['user']['id'];


// find the corresponding note
$note = $db->query('SELECT * FROM notes WHERE id = :id', [
    'id' => $_POST['id'] 
    ])->findOrFail();

// authorize that the current user can edit the note
authorize($note['user_id'] === $currentUserId);

// validate the form
$errors = [];

if (! Validator::string($_POST['body'], 1, 255)) {
    $errors['body'] = 'A body of no more than 255 characteres is required.';
}   

// if no validation errors, update the record in the notes database table.

if (count($errors)) {
    return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note,
    ]);
}

$db->query('UPDATE notes SET title = :title, body = :body where id = :id', [
    'id' => $_POST['id'],
    'title' => $_POST['title'],
    'body' => $_POST['body'],
]);


redirect('/notes');