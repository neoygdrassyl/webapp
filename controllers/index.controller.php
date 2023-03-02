<?php

require  '../models/user.model.php';

$user = new User();
$user->set_username($_POST["username"]);
$user->set_phone($_POST["phone"]);
$user->set_email($_POST["email"]);
$user->set_password($_POST["password"]);


// VALIDATION
$validURL = validateForm($user);

function validateForm($user){
    // USER NAME VALIDATION
    $username_is_valid = true;
    $username_pattern = "/^[A-Za-z]*$/";
    if(strlen($user->get_username()) == 0 || !preg_match($username_pattern, $user->get_username())) $username_is_valid = false;

    // EMAIL VALIDATION
    $email_is_valid = true;
    $email_pattern = "/^(?:(?!.*?[.]{2})[a-zA-Z0-9](?:[a-zA-Z0-9.+!%-]{1,64}|)|\"[a-zA-Z0-9.+!% -]{1,64}\")@[a-zA-Z0-9][a-zA-Z0-9.-]+(.[a-z]{2,}|.[0-9]{1,})$/";
    if(strlen($user->get_email()) == 0 || !preg_match($email_pattern, $user->get_email())) $email_is_valid = false;

    // PHONE VALIDATION
    $phone_is_valid = true;
    $phone_pattern = "/^\+\d{9}$/";
    if(strlen($user->get_phone()) > 0 && !preg_match($phone_pattern, $user->get_phone())) $phone_is_valid = false;


    // PASSWORD VALIDATION
    $password = $user->get_password();
    $password_is_valid = true;
    $password_pattern =  preg_match("/^[A-Za-z*-.]{6}$/", $password);
    $upper_case_pattern = preg_match('/[A-Z]{1}/', $password);
    $special_character_pattern = preg_match('/[*-.]{1}/', $password);
    if(strlen($password) == 0 || !$password_pattern || !$upper_case_pattern || !$special_character_pattern) $password_is_valid = false;

    // RESOLVE VALIDATIONS
    if($username_is_valid && $email_is_valid && $phone_is_valid && $password_is_valid) return "";
    else {
        $url = "?alert=true";
        if(!$username_is_valid) $url = $url."&username=true";
        if(!$email_is_valid) $url = $url."&email=true";
        if(!$phone_is_valid) $url = $url."&phone=true";
        if(!$password_is_valid) $url = $url."&password=true";
        return $url;
    }

}

if(strlen($validURL) == 0) {
    session_start();
    $_SESSION['username'] = $user->get_username();
    $_SESSION['password'] = $user->get_password();
    header("Location: /webapp/views/login.php");
} 
else header("Location: /webapp".$validURL);

exit;

?>