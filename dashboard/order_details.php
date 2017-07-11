<?php
    session_start();

    $id = $_GET['id'];
    $total = $_GET['total'];

    $imgurl = "../img/";

    require '../db.php';

    $sql = " SELECT * FROM user_order WHERE id ='$id'  ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        while ($row = $result->fetch_assoc()) {
            $sql1 = " SELECT od.quantity, p.name, p.description, p.price, p.image
                        FROM order_details od
                        JOIN product p ON od.product_id = p.id
                        WHERE order_id = '$id' ";

            $result1 = $conn->query($sql1);
            if ($result1->num_rows > 0) {
                echo "<table>";
                while ($row1 = $result1->fetch_assoc()) {
?>
                    <tr>
                        <td>
                            Product Name : <?= $row1['name'] ?> <br>
                            Description : <?= $row1['description'] ?> <br>
                            Price : <?= $row1['price'] ?> <br>
                            Quantity : <?= $row1['quantity'] ?>
                        </td>
                        <td>
                            <img src="<?= $imgurl.$row1['image'] ?>" width="100" height="100">
                        </td>
                    </tr>
<?php
                }
            }
?>
            </table>
            <br>
            <p> <b>  Grand Total : <?= $total ?> </b> </p>

            <table>
                    <tr>
                        <td>
                             <b>Order Details :</b> <br>
                             Order ID : <?= $row['id'] ?> <br>
                             Order Date : <?= $row['order_date'] ?> <br>
                             Status : <?= $row['status'] ?>
                        </td>
                    </tr>
                    <tr></tr>
                    <tr>
                        <td>
                            <b> Delivery Details : </b> <br>
                            Name : <?= $row['name'] ?> <br>
                            Mobile : <?= $row['phone'] ?> <br>
                            Address : <?= $row['address'] ?>
                        </td>
                    </tr>
            </table>
<?php
        }
    }

?>
