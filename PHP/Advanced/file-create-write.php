<?php 
    // Writing a file
    $file = fopen("newfile.txt", "w") or die("Unable to open file!");
    $text = "Content of the file\n";
    fwrite($file, $text);
    fwrite($file, $text);
    fclose($file);
    // if you run the PHP script by hitting the right URL in browser, you'd see that when we write the file for the second time, it didn't overwrite, it appended the contents. However if we run the same PHP script once again it'd not append it overwrite the contents.

    // Appending a file
    $file = fopen("newfile.txt", "a") or die("Unable to append file!");
    $text = "Appended to the file!\n";
    fwrite($file, $text);
    fwrite($file, $text);
    fclose($file);
    // This time you'd see that it appends in each case we just mentioned. (You need to comment out first chapter because whenever you execute the script it removes all content so you don't see the appending)

?>