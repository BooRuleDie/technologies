<?php 
    // XML Expat is an event based parser

    // initialize the XML parser
    $parser = xml_parser_create();

    // define a function to use at the start of an element
    function startOfElement($parser, $elementName, $elementAttrs) {
        switch ($elementName) {
            case "NOTE":
                echo "== Note ==<br>"; break;
            case "TO":
                echo "To: "; break;
            case "FROM":
                echo "From: "; break;
            case "HEADING":
                echo "Heading: "; break;
            case "BODY":
                echo "Body: "; 
        }
    }

    // define a function to use at the end of an element
    function enfOfElement($parser, $elementName) {
        echo "<br>";
    }

    // define a function to use when finding character data
    function charData($parser, $data) {
        echo $data;
    }

    // set element handler
    xml_set_element_handler($parser, "startOfElement", "enfOfElement");

    // set character data handler 
    xml_set_character_data_handler($parser, "charData");

    // open XML file
    $file = fopen("note.xml", "r");

    // read data
    while ($data=fread($file,4096)) {
        xml_parse($parser,$data,feof($file)) or die (
            sprintf("XML Error: %s at line %d",
            xml_error_string(xml_get_error_code($parser)),
            xml_get_current_line_number($parser))
        );
      }

    // free the XML parser
    xml_parser_free($parser);
?>