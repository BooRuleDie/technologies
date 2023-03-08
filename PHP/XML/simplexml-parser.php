<?php 
    // There are two types of XML parsers:
    # 1. Tree-based Parsers
        # Holds entire document in memory
        # A better option for small-size XML documents

        # Examples of Tree-based Parsers: SimpleXML, DOM
    
    # 2. Event-based Parsers
        # Doesn't hold the entire document in memory
        # A better option for large-size XML documents

        # Examples of Event-Based Parsers: XMLReader, XML Expat Parser

    // create XML string 
    $xmlString = "<?xml version='1.0' encoding='UTF-8'?>
<note>
    <to> Tom </to>
    <from> Jane </from>
    <heading> Reminder </heading>
    <body> Don't forget me this weekend! </body>
</note>
";
    // load xml string and print the xml 
    $xml = simplexml_load_string($xmlString) or die("Error: cannot read the file");
    print_r($xml);    

    // error handling trick: use libxml to get all erros and iterate through a loop
    $broken_xml = "<?xml version='1.0' encoding='UTF-8'?>
    <document>
    <user>John Doe</wronguser>
    <email>john@example.com</wrongemail>
    </document>";
    $xml = simplexml_load_string($broken_xml);
    if ($xml === false) {
        echo "Loading XML Failed!<br><br>";
        foreach(libxml_get_errors() as $errors) {
            echo $errors -> message . "<br>";
        }
    } else {
        print_r($xml);
    }
    echo "<br><br>";

    //reading from file
    $xml = simplexml_load_file("note.xml") or die("Couldn't Open File!");
    print_r($xml);

    //retrieving tag values using object notation in PHP
    echo "<br>TO: " . $xml -> to . "<br>";
    echo "FROM: " . $xml -> from . "<br>";
    echo "HEADING: " . $xml -> heading . "<br>";
    echo "BODY: " . $xml -> body . "<br>";

    // if there is multiple occurences of the same tag we can access them by specifying index
    $xml = simplexml_load_file("bookstore.xml") or die("Couldn't Open File!");
    echo "<br>First Book's Title: " . $xml -> book[0] -> title . "<br>";
    echo "<br>Second Book's Title: " . $xml -> book[1] -> title . "<br>";
    echo "<br>Third Book's Title: " . $xml -> book[2] -> title . "<br>";

    // looping through all elements
    foreach($xml as $books) {
        echo "<br>";
        echo $books -> title . "<br>";
        echo $books -> author . "<br>";
        echo $books -> year . "<br>";
        echo $books -> price . "<br>";
    }

    // get attribute values
    echo "<br>" . $xml -> book[0]["category"] . "<br>";

    // looping through title tags to get lang attributes' values
    foreach($xml as $books) {
        echo $books -> title["lang"] . "<br>";
    }

?>