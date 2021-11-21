<?php
    $xml = new DOMDocument();
    $xml->preserveWhiteSpace = false;
    $xml->formatOutput = true;
    
    $xml->load("../xml files/chatMessages.xml");

    

    $chatMessage = $xml->createElement("chatMesssage");
    $from = $xml->createElement("from", $_POST["from"]);
    $to = $xml->createElement("to", $_POST["to"]);
    $message = $xml->createElement("message", $_POST["message"]);
    $date = $xml->createElement("date",date("Y-m-d"));
    $time = $xml->createElement("time", date("h:i a"));


    $chatMessage->appendChild($from);
    $chatMessage->appendChild($to);
    $chatMessage->appendChild($message);
    $chatMessage->appendChild($date);
    $chatMessage->appendChild($time);
    

    $xml->getElementsByTagName("chatMesssages")->item(0)->appendChild($chatMessage);
    $xml->save("../xml files/chatMessages.xml");
    echo "chat added";
?>