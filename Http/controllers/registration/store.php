<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

// dd($email);
//validate the form inputs
$errors = [];

if (!Validator::email($email)){
    $errors['email'] = 'Provide a valid email address.';
}

if (!Validator::string($password, 7, 255)){
    $errors['password'] = 'Please provide a password of at least 7 characters.';
}

if(!empty($errors)){
    return view('registration/create.view.php',[
        'errors' => $errors,
    ]);
}


//check if the account already exists
$db = App::resolve(Database::class);
$user = $db->query('SELECT * FROM users WHERE email= :email', [
    'email'=> $email
])->find();

if ($user) {
    // then someone with that email already exists and has an account
    // If yes, redirect to a login page

    header('location: /');
    exit();

} else {
    // If not, save one to the database, and log the user in, and redirect.

    $db->query('INSERT INTO users(password, email) VALUES(:password, :email)',[
        'password'=> password_hash($password, PASSWORD_BCRYPT),
        'email'=> $email,
    ]);

    
    (new Authenticator)->login($user);

    // dd($_SESSION['user']);
    // redirect 
    header('location: /');
    exit();
}