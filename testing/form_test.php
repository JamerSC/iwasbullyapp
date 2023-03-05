<?php 

include '../connection/DBconnection.php';

//(isset($_POST['submit'])) with name
if(isset($_POST['submit'])) 
{
    $image = $_FILES['image']['name'];

    try {

        $stmt = $conn->prepare("INSERT INTO images (img_name, image) VALUES (:img_name, :image)");
        $stmt->execute([
           'img_name' => $img_name,
           'image' => $image
        ]);


        

        echo " <script>alert('Data inserted Succesfuly!!')</script>";
        
    } catch (PDOException $e) {
        echo "Connection Failed " . $e->getMessage();
        die();
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            align-items:flex-start;
            justify-content: center;
            display: flex;
            height: 100vh;
        }

    </style>
</head>
<body>
    
    <div class="container">
        <br>
        <br>
        <form method="POST" action="#" enctype="multipart/form-data">
            <br>
            <br>
            <input type='file' name='files[]' multiple />
            <br>
            <br>
            <input type="submit" value="Submit" name="submit">
        </form>
    </div>

</body>
</html>