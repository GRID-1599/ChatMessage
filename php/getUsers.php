<?php

$xml = new DOMDocument();
$xml->load("../xml files/users.xml");

$users = $xml->getElementsByTagName("user");

foreach ($users as $user) {
    $username = $user->getAttribute("userName");
    $password = $user->getElementsByTagName("password")[0]->nodeValue;
    echo "$username|$password|";
}
?>

