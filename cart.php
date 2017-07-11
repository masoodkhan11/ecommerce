<?php

    include 'header.php';
    echo "<br><br><br><br><br>";
    session_start();

    $_SESSION['cart'][] = array ("id"=> $_SESSION['id'], "qty"=> $_GET['qty'] );

    require 'db.php';
    $imgurl = "img/";
    $grandtotal = 0;

    foreach ($_SESSION['cart'] as $product) {

        $sql = " SELECT * FROM product WHERE id='" .$product['id'] ."' ";
        $result = $conn->query($sql);
?>
        <table>
            <tr>

            <?php
                 if ($result->num_rows > 0) {
                     while ($row = $result->fetch_assoc()) {
                        $total = $product['qty'] * $row['price'];
            ?>
                <form action="checkout.php" method="get">

                    <td>
                        Name : <?= $row['name'] ?> <br>
                        Price : <?= $row['price'] ?> <br>
                        Qtty : <?= $product['qty'] ?> <br>
                        Total : <?= $total ?>
                    </td>
                    <td>
                        <img src=" <?= $imgurl.$row['image'] ?>" height="110" width="100" >
                    </td>
                </tr>
                <tr></tr>

<?php
            }
        }
        $grandtotal += $total;
        $_SESSION['total'] = $grandtotal;
    }$conn->close();
 ?>
                <tr>
                    <td>
                        Grand Total : <?= $grandtotal ?>
                    </td>
                </tr>
                <tr><td></td> </tr>
                <tr>
                    <td>
                        <input type="submit" name="btncheckout" value="Checkout & Proceed">
                    </td>
                </form>

                <form action="index.php" method="get">
                   <td>
                        <input type="submit" name="btnhome" value="Continue Shopping">
                    </td>
                </form>

                </tr>
    </table>
