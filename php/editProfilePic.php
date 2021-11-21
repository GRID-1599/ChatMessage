<?php
if (isset($_FILES['image'])) {
    $userName = $_GET["name"];

    $file_name = $_FILES['image']['name'];

    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];

    $destination = "../user pics/" . $file_name;
    move_uploaded_file($file_tmp, $destination);
    $newPath = "user pics/" . $file_name;
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
            $newUser->appendChild($xml->createElement("profilePic", $newPath));
            $newUser->appendChild($xml->createElement("status", $user->getElementsByTagName("status")[0]->nodeValue));

            $oldUser = $user;

            $xml->getElementsByTagName("users")->item(0)->replaceChild($newUser, $oldUser);
            $xml->save("../xml files/users.xml");
            break;
        }
    }
}