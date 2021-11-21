<?php
$userName = $_POST["userName"];
$status = $_POST["status"];


$xml = new DOMDocument("1.0");
$xml->preserveWhiteSpace = false;
$xml->formatOutput = true;
$xml->load("../xml files/users.xml");
$users = $xml->getElementsByTagName("user");

foreach ($users as $user) {
    if ($user->getAttribute("userName") == $userName) {
        $newUser = $xml->createElement("user");
        $newUser->setAttribute("userName", $user->getAttribute("userName"));
        $newUser->appendChild($xml->createElement("password", $user->getElementsByTagName("password")[0]->nodeValue));
        $newUser->appendChild($xml->createElement("firstName", $user->getElementsByTagName("firstName")[0]->nodeValue));
        $newUser->appendChild($xml->createElement("lastName", $user->getElementsByTagName("lastName")[0]->nodeValue));
        $newUser->appendChild($xml->createElement("profilePic", $user->getElementsByTagName("profilePic")[0]->nodeValue));
        $newUser->appendChild($xml->createElement("status", $status));

        $oldUser = $user;

        $xml->getElementsByTagName("users")->item(0)->replaceChild($newUser, $oldUser);
        $xml->save("../xml files/users.xml");
        echo "updated";
        break;
    }
}
