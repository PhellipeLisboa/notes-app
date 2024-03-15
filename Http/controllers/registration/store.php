<?php


use Core\Database;
use Core\Validator;
use Core\App;
use Core\Authenticator;


use Http\Forms\LoginForm;


$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];


// validate the form inputs.
$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least 7 characteres.';
}

if (! empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

// check if the account already exists

$db = App::resolve(Database::class);

$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();


if ($user) {
    // then someone eith that email already exists and has an account.
    // If yes, redirect to a login page.
    header('location: /');
    exit();
} else {
    // Is not, save one to the database, and then log the user in, and redirect.
    $db->query('INSERT INTO users(username, email, password) VALUES(:username, :email, :password)', [
        'username' => $username,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);
}

// mark that the user has logged in.

/* login([
    'email' => $email
]);

header('location: /');
exit(); */

$form = new LoginForm([
    'email' => $email,
    'password' => $password,
]);

if ($form->validate([
    'email' => $email,
    'password' => $password,
])) {
    
    $auth = new Authenticator();

    if ($auth->attempt($email, $password)) {
        redirect('/');
    }
    
    $form->error('email', 'No matching account found for that email address and password.');
} 


return view('registration/create.view.php', [
    'errors' => $form->errors()
]);