<?php

    session_start();

    require '../db.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pswd = $_POST['pswd'];

    $sql = " INSERT INTO auth (name, email, password) VALUES ('$name', '$email', '$pswd') ";

    if($conn->query($sql)){
        $_SESSION['name'] = $name ;
        header ('Location: index.php') ;
    }

?>
