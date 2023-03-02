<?php
session_start();

$body_index = file_get_contents("./login.html");
$html = file_get_contents("./header.html");
$html = str_replace("@BODY", $body_index, $html);

// ALERT HANDLERS
$alert = '<div class="alert alert-danger" role="alert"><b>ERROR IN THE LOGIN PROCESS</b><div>the username and password do not match</div></div>';

if (isset($_REQUEST['validation']) && $_REQUEST['validation'] == "false") $html = str_replace("@ALERT", $alert, $html);
else $html = str_replace("@ALERT", "", $html);

echo $html;
?>