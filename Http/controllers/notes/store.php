<?php


use Core\Validator;
use Core\Database;
use Core\App;


$db = App::resolve(Database::class);
$errors = [];


if (! Validator::string($_POST['body'], 1, 255)) {
    $errors['body'] = 'A body of no more than 255 characteres is required.';
}       

if (! empty($errors)) {
    return view("notes/create.view.php", [
        'heading' => 'Create Note',
        'errors' => $errors,
    ]);
}

$db->query('INSERT INTO notes(title, body, user_id) VALUES(:title, :body, :user_id)', [
    'title' => $_POST['title'],
    'body' => $_POST['body'],
    'user_id' => $_SESSION['user']['id']
]);     

header('Location: /notes');
die();