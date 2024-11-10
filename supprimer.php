<?php
    session_start();
    include_once('database.php');
    $database = new Database;
    $database->conn = $database->connect();
    $id = $_GET['id'];

    $req = mysqli_query($database->conn,"DELETE FROM `Matieres` WHERE id = $id");
    header('location:listes.php');
?>