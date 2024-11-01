<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = $db->query('select id from users where email=:email', [
    'email' => $_SESSION['user']['email'] ?? 'NULL',
])->find();

$currentUserId = $currentUserId['id'];

$note = $db->query('select * from notes where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($note['user_id'] === $currentUserId);


view("notes/edit.view.php", [
    'heading' => 'Edit Note',
    'errors' => [],
    'note' => $note
]);