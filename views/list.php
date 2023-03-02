<?php

$body_index = file_get_contents("./list.html");
$html = file_get_contents("./header.html");
$html = str_replace("@BODY", $body_index, $html);

echo $html;
?>