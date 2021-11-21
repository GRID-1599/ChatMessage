<?php
$thisUser = $_GET["fromThisUser"];
$toThisUser = $_GET["toThisUser"];
$xml = new DOMDocument();
$xml->load("../xml files/chatMessages.xml");
$chatMesssages = $xml->getElementsByTagName("chatMesssage");

$htmlText = '<table>';
foreach ($chatMesssages as $chatMesssage) {
    $from = $chatMesssage->getElementsByTagName("from")->item(0)->nodeValue;
    $to = $chatMesssage->getElementsByTagName("to")->item(0)->nodeValue;
    $message = $chatMesssage->getElementsByTagName("message")->item(0)->nodeValue;
    $date = $chatMesssage->getElementsByTagName("date")->item(0)->nodeValue;
    $time = $chatMesssage->getElementsByTagName("time")->item(0)->nodeValue;

    // galing sa user yung messsage
    if (($from == $thisUser) && ($to == $toThisUser)) {
        $htmlText .= <<<_MSG
            <tr class='msgCont'>
            <td>
                <div class="send">
                <p>$message</p>
                <footer class='dateTime'>$date  $time  </footer>
                </div>
                </td>
            </tr>
            _MSG;
    // pag galing sa iba yung message
    } else if (($to == $thisUser) && ($from == $toThisUser)) {
        $htmlText .= <<<_MSG
            <tr class='msgCont'>
            <td>
                <div class="recieve">
                <p>$message</p>
                <footer class='dateTime'>$date  $time  </footer>
                </div>
                </td>
            </tr>
            _MSG;
    }
}
echo $htmlText . "</table>" ;
