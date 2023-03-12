<?php 

session_start();

require_once 'connection.php';


if(isset($_POST['post'])) 
{

    try 
    {
        $UserID = $_SESSION['UserID'];

        $PostHeader = $_POST['PostHeader'];
        $PostBody = $_POST['PostBody'];
    
        $PostImage= $_FILES['PostImage']['name'];
        $tmpName = $_FILES['PostImage']['tmp_name'];
        $imageLocation = "../uploads/".$PostImage;
        move_uploaded_file($tmpName, $imageLocation);

        $PostStatus = 1;
    
        $stmt = $conn->prepare("INSERT INTO Post 
        (UserID, PostHeader, PostBody, PostImage, CreatedBy, PostStatus)
        VALUES (:UserID, :PostHeader, :PostBody, :PostImage, :CreatedBy, :PostStatus)
        ");
        $stmt->execute([

            'UserID' => $UserID,
            'PostHeader' => $PostHeader,
            'PostBody' => $PostBody,
            'PostImage' => $PostImage,
            'CreatedBy' => $UserID,
            'PostStatus' => $PostStatus
        ]);

        echo " <script>alert('Published Post Succesfuly!!')</script>";
        echo "<script>window.location = '../post.php'</script>";


    } 
    catch (PDOException $e) 
    {
        echo "Connection Failed " . $e->getMessage();
        die();
    
    }
}



?>