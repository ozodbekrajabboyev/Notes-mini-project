<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = $db->query('select id from users where email=:email', [
    'email' => $_SESSION['user']['email'] ?? 'NULL',
])->find();

$currentUserId = $currentUserId['id'];

$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);


$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

if (count($errors)){
    return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors'=> $errors,
        'note' => $note,
    ]);
}

$db->query('UPDATE notes SET body = :body WHERE id= :id',[
    'id'=> $_POST['id'],
    'body'=> $_POST['body'],
]);

header('location: /notes');
die();