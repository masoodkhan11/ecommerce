<?php

    session_start();

    require '../db.php';

    $id = $_GET['id'];

        $sql = " DELETE FROM product WHERE id='$id' ";

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully ";
        } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();

    echo '<b> <a href="products.php"> Back to Products </a> </b>';
 ?>
