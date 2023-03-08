<?php 
    // XML DOM is a tree based parser -> loads all document into memory

    // load and output the XML
    $xml = new DOMDocument();
    $xml -> load("note.xml");
    print_r($xml -> saveXML()); // Output: Tove Jani Reminder Don't forget me this weekend!

    echo "<br><be>";
    
    // loop through xml
    $xml = new DOMDocument();
    $xml -> load("note.xml");
    $documentElements = $xml -> documentElement;
    foreach($documentElements -> childNodes as $childNode) {
        echo $childNode -> nodeName . ": " . $childNode -> nodeValue . "<br>";
    }
?>