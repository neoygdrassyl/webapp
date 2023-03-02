<?php

session_start();

$body_index = file_get_contents("./index.html");
$html = file_get_contents("./header.html");
$html = str_replace("@BODY", $body_index, $html);

// ALERT HANDLERS
$alert = '<div class="alert alert-danger" role="alert"><b>ERROR IN THE FORM SUBMITION</b></div>';
if (isset($_REQUEST['username']) && $_REQUEST['username'] == "true") $alert = $alert . '<div class="alert alert-danger p-0 m-0 mb-1" role="alert"><b>username</b> must not be empty and contain only letters</div>';
if (isset($_REQUEST['phone']) && $_REQUEST['phone'] == "true") $alert = $alert . '<div class="alert alert-danger p-0 m-0 mb-1" role="alert"><b>phone</b> first letter must be "+" and contain only 9 numbers</div>';
if (isset($_REQUEST['email']) && $_REQUEST['email'] == "true") $alert = $alert . '<div class="alert alert-danger p-0 m-0 mb-1" role="alert"><b>email</b> must not be empty and be a valid email address</div>';
if (isset($_REQUEST['password']) && $_REQUEST['password'] == "true") $alert = $alert . '<div class="alert alert-danger p-0 m-0 mb-1" role="alert"><b>password</b> must not be empty and contain only one upper case letter and one of these symbols: (* - .)</div>';

if (isset($_REQUEST['alert']) && $_REQUEST['alert'] == "true") $html = str_replace("@ALERT", $alert, $html);
else $html = str_replace("@ALERT", "", $html);

echo $html;
?>