<?php
$xml = new DOMDocument("1.0");
$xml->load("../xml files/users.xml");
$users = $xml->getElementsByTagName("user");

$htmlText = "<table>";
foreach ($users as $user) {
    $username = $user->getAttribute("userName");
    if ($_GET["userName"] != $username) {

        $firstName = $user->getElementsByTagName("firstName")->item(0)->nodeValue;
        $lastName = $user->getElementsByTagName("lastName")->item(0)->nodeValue;
        $status = $user->getElementsByTagName("status")->item(0)->nodeValue;
        $pic = $user->getElementsByTagName("profilePic")->item(0)->nodeValue;
        $userFullName = $firstName . " " . $lastName;
        if ($status == "online") {
            $htmlText .= <<<_USER
                <tr onclick="showMessageWindow('$userFullName', '$username')">
                <td><img src= '$pic'></td>
                <td WIDTH='75%'>$userFullName</td>
                </tr>
            _USER;
        }
    }
}
echo $htmlText . "</table>";
