<?php
session_start();

include 'header.php';

$pid = $_GET['pid'];

$imgurl = "img/";

require 'db.php';
$sql = "SELECT * FROM product WHERE id='$pid' ";
$result = $conn->query($sql);

if($result->num_rows > 0) {

 while($row = $result->fetch_assoc()) {
    $_SESSION['id'] = $row['id'];
    ?>

    <br><br><br><br><br>
    <table>
        <tr>
            <td>
                <form action="cart.php" method="get">
                    Product ID : <?=$row['id'] ?> <br>
                    Poduct Name : <?=$row['name'] ?> <br>
                    Price : <?=$row['price'] ?> <br>
                    Description :- <br> <?=$row['description'] ?> <br><br>
                    Quantity : <input type="number" name="qty" value="1" min="1" max="10">
                </td>
                <td></td>
                <td>
                    <img src=" <?= $imgurl.$row['image'] ?>" width="200" height="250" hspace="20" vspace="20">
                </td>
            </tr>
        </table>
        <input type="submit" name="addcrt" value="Add To Cart">
</form>

        <?php
    }
}
$conn->close();
?>



