<?php
    $xml = new DOMDocument();
    $xml->preserveWhiteSpace = false;
    $xml->formatOutput = true;
    
    $xml->load("../xml files/users.xml");

    $user = $xml->createElement("user");
    $firstName = $xml->createElement("firstName", $_POST["firstName"]);
    $lastName = $xml->createElement("lastName", $_POST["lastName"]);
    $password = $xml->createElement("password", $_POST["password"]);
    $imagePath = $xml->createElement("profilePic", "user pics/default.png");
    $status = $xml->createElement("status", "offline");

    $user->setAttribute("userName", $_POST["username"]);
    $user->appendChild($password);
    $user->appendChild($firstName);
    $user->appendChild($lastName);
    $user->appendChild($imagePath);
    $user->appendChild($status);
    

    $xml->getElementsByTagName("users")->item(0)->appendChild($user);
    $xml->save("../xml files/users.xml");

?>