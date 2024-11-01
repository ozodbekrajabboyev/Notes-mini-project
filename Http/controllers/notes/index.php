<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


$currentUserId = $db->query('select id from users where email=:email', [
    'email' => $_SESSION['user']['email'] ?? 'NULL',
])->find();

$currentUserId = $currentUserId['id'];

$notes = $db->query('select * from notes where user_id = :user_id',[
    'user_id' => $currentUserId,
])->get();

view("notes/index.view.php", [
    'heading' => 'My Notes',
    'notes' => $notes
]);