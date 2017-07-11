<?php

    session_start();

    echo '<p style="text-align: right"> <a href="index.php"> Home </a> </p> ';

    $imgurl = "../img/";

    require '../db.php';

    $sql = " SELECT id, name, order_date, status FROM user_order ";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table cellpadding='5'>";

        while ($row = $result->fetch_assoc()) {
            $sql1 = " SELECT product_id, quantity FROM order_details WHERE order_id = '".$row['id']."' ";
            $result1 = $conn->query($sql1);
            if ($result1->num_rows > 0 ) {
                while ($row1 = $result1->fetch_assoc()) {

                    $sql2 = " SELECT price FROM product WHERE id='".$row1['product_id']."' ";

                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0 ) {
                        while ($row2 = $result2->fetch_assoc()) {
                            $total = $row2['price'] * $row1['quantity'];
                        }
                    }
                    $grand += $total;
                }
            }
?>
            <tr>
                <td>
                    Order ID : <?= $row['id'] ?> <br>
                    Name : <?= $row['name'] ?> <br>
                    Order Date : <?= $row['order_date'] ?> <br>
                    Status : <?= $row['status'] ?> <br>
                    Grand Total : <?= $grand ?> <br>
                </td>

                <td>
                    <a href="order_details.php?id=<?= $row['id']?>&amp;total=<?=$grand?> "> View </a>
                </td>
            </tr>
<?php
        }
        echo "</table>";
    }
 ?>
