<?php
    include 'header.php';
    echo "<br><br><br><br><br>";

    session_start();

    $name = $_GET['name'];
    $mobile = $_GET['mobile'];
    $address = $_GET['adrs'];
    $date = date('Y/m/d h:i:s', time());

    $pid = array();
    $qty = array();

    require 'db.php';

    $sql = " INSERT INTO user_order (name, phone, address, order_date)
            VALUES ('$name', '$mobile', '$address', '$date') ";

    if ($conn->query($sql) === TRUE){
        $order_id = $conn->insert_id ;
        $_SESSION['ord_id'] = $order_id ;
    }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    foreach ($_SESSION['cart'] as $product) {
        array_push($pid, $product['id']);
        array_push($qty, $product['qty']);
    }

    $max = count($_SESSION['cart']);

    $sql = " INSERT INTO order_details (order_id, product_id, quantity) VALUES";
    for($i=0; $i<$max; $i++){
        $sql .=  "('$order_id','$pid[$i]', '$qty[$i]') ";
        if($i < ($max -1 )){
            $sql .=",";
        }

    }



    if ($conn->query($sql) === TRUE) {
        header('Location: order.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

 ?>
