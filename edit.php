
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crudphp";

$conn = new mysqli($servername,$username,$password,$dbname);

$uid = "";
$name = "";
$email = "";
$phone = "";
$id = "";

$errormessage = "";
$successmessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET'){

    if(!isset($_GET["id"])){
        header("Location: index.php");
        exit;
    }

    $uid = $_GET["id"];

    $sql = "SELECT * FROM crud_table WHERE id=$uid";
    $results = $conn->query($sql);
    $row = $results->fetch_assoc();

    if(!$row){
        header("Location: index.php");
        exit;
    }

    $name = $row["crud_name"];
    $email = $row["crud_email"];
    $phone = $row["crud_phone"];
    $id = $row["crud_id"];

}else{

    $uid = $_POST["uid"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $id = $_POST["id"];


    do{
        if(empty($name) || empty($email) || empty($phone) || empty($id)){
            $errormessage = "All fields are required";
            break;
        }

        $sql = "UPDATE crud_table SET crud_name='$name', crud_email='$email', crud_phone='$phone', crud_id='$id' WHERE id=$uid ";
        $results = $conn->query($sql);
        if(!$results){
            $errormessage = "wrong update query";
            break;
        }

        $successmessage = "Data updated successfully!";

        header("Location: index.php");
        exit;

    }while(false);

    
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update method</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
    
    if(!empty($errormessage)){
        echo "
        <div class='error'>$errormessage</div>
        ";
    }

    ?>

    <form method="POST">
        
        <input type="hidden" name="uid" value="<?php echo $uid?>">
        <label for="name">Name</label>
        <input type="text" name="name" value="<?php echo $name?>"><br>
        <label for="email">Email</label>
        <input type="text" name="email" value="<?php echo $email?>"><br>
        <label for="phone">Phone</label>
        <input type="text" name="phone" value="<?php echo $phone?>"><br>
        <label for="id">ID Number</label>
        <input type="text" name="id" value="<?php echo $id?>"><br>
        <button type="submit">Submit</button>
    </form>

    <?php
    
    if(!empty($successmessage)){
        echo "
        <div class='success'>$successmessage</div>
        ";
    }

    ?>

    <button><a href="index.php">Cancel</a></button>
    
</body>
</html>