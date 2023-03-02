<?php
session_start();
// VALIDATION
$isValid = validateForm();

function validateForm(){
    $username_is_valid = $_POST["username"] == $_SESSION['username'];
    $password_is_valid = $_POST["password"] == $_SESSION['password'];
    return $username_is_valid && $password_is_valid;
}

if($isValid) header("Location: /webapp/views/list.php");
else header("Location: /webapp/views/login.php?validation=false");

exit;

?>