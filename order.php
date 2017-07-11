<?php
    include 'header.php';
    echo "<br><br><br><br><br>";

    session_start();

    require 'db.php';

    $sql = " SELECT * FROM user_order WHERE id='" .$_SESSION['ord_id']. "' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Your Order Details : <br><br>";
            echo "Order Id : " .$row['id']. "<br>";
            echo "Order Date :" .$row['order_date']. "<br>";
            echo "Total Amount :" .$_SESSION['total'];

            echo "<h3> Thanks for purchasing our products.. </h3>";
        }
    }
    session_destroy();

?>






