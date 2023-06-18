

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complete crud operations</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>PHP CRUD OPERATIONS</h1>

    <a class="edit" href="add.php">ADD NEW</a>

    <table>
        <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>ID</th>
            <th>Action</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crudphp";

    $conn = new mysqli($servername,$username,$password,$dbname);

    if ($conn->connect_error){
        die("Connection failed" . $conn->connect_error);
    }

    $sql = "SELECT * FROM crud_table";
    $results = $conn->query($sql);
    while($row = $results->fetch_assoc()){
        echo "
        <tr>
        <td>$row[id]</td>
        <td>$row[crud_name]</td>
        <td>$row[crud_email]</td>
        <td>$row[crud_phone]</td>
        <td>$row[crud_id]</td>
        <td><a class='edit' href='edit.php?id=$row[id]'>UPDATE</a></td>
        <td><a class='format1' href='format1.php?id=$row[id]'>DELETE</a></td>
    </tr>
        ";
}

$conn->close();
?>

        
    </tbody>
    </table>
    
    <small>Designed by Dr. Ezra</small>
</body>
</html>

