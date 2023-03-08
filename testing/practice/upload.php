<?php

if(isset($_POST['submit'])) {

    $file = $_FILES['file'];
    //print_r($file);
    $fileName = $_FILES['file']['name'];
    $fileTmp = $_FILES['file']['tmp_name']; //temporary location
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName); //File extension
    $fileActualExt = strtolower(end($fileExt)); //Checking file extension

    $allowed = array('jpg', 'jpeg', 'png', 'pdf', 'docx', 'xlsx', 'pptx');

    if(in_array($fileActualExt, $allowed)) //array
    {
        if($fileError === 0) 
        {
            if($fileSize < 200000)   //50 Megabyte
            {
                $fileNameNew = uniqid('', true).".".$fileActualExt;

                $fileDestination = 'uploads/'.$fileNameNew;

                move_uploaded_file($fileTmp, $fileDestination);

                header("location: test.php?uploadsuccess");
            }
            else
            {
                echo 'Your file is too big!';
            }
        }
        else
        {
            echo 'There was an error uploading your file';
        }
    
    }
    else 
    {
        echo 'File is not supported, please try other format';
    }



}

?>