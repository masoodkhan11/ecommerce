<?php

    session_start();

    include 'header.php';
    echo "<br><br><br><br><br><br> ";

    if (!isset($_SESSION['name'])) {
        header('Location: ../index.php');
    }

    echo "Hii " .$_SESSION['name']. "<a href='logout.php'> Logout </a> ";
 ?>

    <br><br>
    <h3>
        <a href="products.php"> Products </a>    <br><br>
        <a href="orders.php"> Orders </a>
    </h3>


