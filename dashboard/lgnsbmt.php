<?php

    session_start();

    require '../db.php';

    $email = $_POST['email'];
    $pswd = $_POST['pswd'];

    $sql = " SELECT * FROM auth WHERE email='$email' AND password='$pswd' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row= $result->fetch_assoc()) {
            $_SESSION['name'] = $row['name'];
            header('Location: index.php');
        }
    }

 ?>
