<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = $db->query('select id from users where email=:email', [
    'email' => $_SESSION['user']['email'] ?? 'NULL',
])->find();

$currentUserId = $currentUserId['id'];

$note = $db->query('select * from notes where id = :id', [
    'id' => $_POST['id'],
])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query('DELETE FROM notes WHERE id=:id', [
    'id' => $_POST['id'],
]);

header('location: /notes');
exit();
