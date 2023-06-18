<?php

if(isset($_GET["id"])){
    $uid = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crudphp";

    $conn = new mysqli($servername,$username,$password,$dbname);

    $sql = "DELETE FROM crud_table WHERE id=$uid";
    $results = $conn->query($sql);

    header("Location: index.php");
    exit;

}

?>