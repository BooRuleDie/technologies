<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- If you want to build a form section for file upload there are two requirements:
    
    
    1. method must be POST
    2. enctype attribute's value must be 'multipart/form-data
    
    This attribute is used to perform proper encoding for the data that is being posted from forms. There are three possible values:
        1 application/x-www-form-urlencoded: Default behaviour. All characters are encoded before sent. Spaces are converted to '+', special chars are converted to ASCII HEX values.
        2. multipart/form-data: It's necessary if the user will upload a file through the form.
        3. text/plain: No encoding applied. Not reccommended.
    
        '-->
    <form action="file-upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="uploadedFile"><br><br>
        <input type="submit" name="submit" value="Upload Image">
    </form>

    <?php   
        // First we need to check whether the file upload option is enabled in the php.ini conf file
        // if you're using XAMPP, the path should be the following: 
            # Path: C:\xampp\php\php.ini
            # ; Whether to allow HTTP file uploads.
            # ; https://php.net/file-uploads
            # file_uploads=On -> THIS SHOULD BE ON

            $target_dir = "uploads/"; // Directory that files will be uploaded
            $target_file = $target_dir . basename($_FILES["uploadedFile"]["name"]); // uploads/<name of the file>
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION)); // takes the extension of file, probably not a secure way to check the file type. Search about file upload vulnerabilities and prevention methods.          

            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"]) and !($_FILES["uploadedFile"]["size"] == 0)) {
                $check = getimagesize($_FILES["uploadedFile"]["tmp_name"]); // PHP stores files that is uploaded temporarily in the temp directory of operating systems, when the upload operation is successfull it's deleted.
                if($check !== false) {

                    // Check if file already exists
                    if (file_exists($target_file)) {
                        echo "Sorry, file already exists.<br>";
                        $uploadOk = 0;
                    }

                    // Check file size
                    if ($_FILES["uploadedFile"]["size"] > 500000) {
                        echo "Sorry, your file is too large.<br>";
                        $uploadOk = 0;
                    }

                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
                        $uploadOk = 0;
                    }
                    
                    // set uploadOk to 1 if all checks passed
                    if ($uploadOk !== 0) {
                        echo "File is an image - " . $check["mime"] . ".<br>"; // mime type of the file
                        $uploadOk = 1;
                    }
                    
                } else {
                    echo "File is not an image.<br>";
                    $uploadOk = 0;
                }
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.<br>";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["uploadedFile"]["tmp_name"], $target_file)) {
                    echo "The file ". htmlspecialchars( basename( $_FILES["uploadedFile"]["name"])). " has been uploaded.<br>";
                } else {
                    echo "Sorry, there was an error uploading your file.<br>";
                }
            }

    ?>    
</body>
</html>

