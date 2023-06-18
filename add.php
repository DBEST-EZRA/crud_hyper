
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crudphp";

$conn = new mysqli($servername,$username,$password,$dbname);


$name = "";
$email = "";
$phone = "";
$id = "";

$errormessage = "";
$successmessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $id = $_POST['id'];

    do{
        if(empty($name) || empty($email) || empty($phone) || empty($id)){
            $errormessage = "All fields are required";
            break;
        }

        $sql = "INSERT INTO crud_table (crud_name, crud_email, crud_phone, crud_id) VALUES
        ('$name', '$email', '$phone', '$id')";

        $results = $conn->query($sql);

        if(!$results){
            $errormessage = "Wrong adding data query!";
            break;
        }

        $name = "";
        $email = "";
        $phone = "";
        $id = "";

        $successmessage = "data added successfully";

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
    <title>add method</title>
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
        
        <!-- <input type="hidden" name="uid" value=""> -->
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