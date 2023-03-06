<?php 
// reading contents of a file
$contents = readfile("file-to-read.txt");
echo $contents . "<br>";

// A better way to read from file
$file = fopen("file-to-read.txt", "r") or die("File doesn't exist!");
    echo fread($file, filesize("file-to-read.txt"));
fclose($file);

// reading single line
$file = fopen("file-to-read.txt", "r") or die("File does not exist!");
    for($i = 0; $i < 5; $i++) {
        $line = fgets($file);
        echo "line $i: $line<br>";
        // in each iteration fgets() reads the next line
    }
fclose($file);
echo "<br>";

// reading each line of the file using feof (EOF end-of-file)
$file = fopen("file-to-read.txt", "r") or die("File does not exist!");

while(!feof($file)) {
    echo fgets($file) . "<br>";
}

fclose($file);

// we can use the same technique to read the every char of the file using fgetc()

$file = fopen("file-to-read.txt", "r") or die("File does not exist!");

while(!feof($file)) {
    echo fgetc($file) . " ";
}

fclose($file);
?>