<?php

$userName = $_GET["userName"];

$xml = new DOMDocument("1.0");
$xml->load("../xml files/users.xml");
$users = $xml->getElementsByTagName("user");

foreach ($users as $user) {
    $theUserName = $user->getAttribute("userName");
    if ($theUserName == $userName) {
        echo $user->getElementsByTagName("profilePic")->item(0)->nodeValue;
        break;
    }
}
