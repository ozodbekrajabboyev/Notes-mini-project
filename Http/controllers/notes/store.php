<?php

use Core\Validator;
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
$currentUserId = $db->query('select id from users where email=:email', [
    'email' => $_SESSION['user']['email'] ?? 'NULL',
])->find();

$currentUserId = $currentUserId['id'];
$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

if (!empty($errors)) {
    return view("notes/create.view.php", [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}

$db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
    'body' => $_POST['body'],
    'user_id' => $currentUserId,
]);

header('location: /notes');
die();
