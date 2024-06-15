<?php
session_start();
require_once 'Database.php';
require_once 'User.php';

$db = new Database();
$user = new User($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['Email'];
    $email = $_POST['Number'];
    $password = $_POST['Password'];
    $user->register($name, $email, $password);
}

echo "<a href='index.php'>Return to main page</a>";
?>

