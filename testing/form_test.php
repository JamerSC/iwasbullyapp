<?php 

include '../connection/DBconnection.php';


if(isset($_POST['date']) && isset($_POST['time'])
    && isset($_POST['remarks']) && isset($_POST['image'])) 
{

    $date = $_POST['date'];
    $time = $_POST['time'];
    $remarks = $_POST['remarks'];
    $image = $_POST['image'];
//    $image = $_FILES['image']['name'];

//    move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' . $image);

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $conn->prepare("INSERT INTO test (date, time, remarks, image)
         VALUES (:date, :time, :remarks, :image)");
        $stmt->execute([
           'date' => $date,
           'time' => $time,
           'remarks' => $remarks,
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
            justify-content: space-evenly;
            display: flex;
            height: 100vh;
        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 15px;
            width: 50%;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <br>
        <br>
        <form method="POST" action="#">
            <input type="date" name="date">
            <br>
            <br>
            <input type="time" name="time"> 
            <br>
            <br>
            <textarea placeholder="Leave a comment here" name="remarks"></textarea>
            <br>
            <br>
            <input type="file" name="image">
            <br>
            <br>
            <input type="submit" value="SEND">
        </form>
        <br>

<?php        
        $stmt2 = $conn->prepare("SELECT * FROM test");
        $stmt2->execute();
        $fetch = $stmt2->fetchAll(PDO::FETCH_ASSOC);
?>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Remarks</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($fetch as $datetime): ?>
                <tr>
                    <td><?php echo  $formatted_date = date("F d, Y", strtotime($datetime['date']));?></td>
                    <td><?php echo  $formatted_time = date("h:i a", strtotime($datetime['time']));?></td>
                    <td><?php echo $datetime['remarks']; ?></td>
                    <td><img src="<?php $datetime['image']; ?>" alt="image"></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        

    </div>

</body>
</html>