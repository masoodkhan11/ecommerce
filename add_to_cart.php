<?php
    session_start();
    require 'db.php';

    $pid = $_SESSION['id'];
    $imgurl = "img/";

    $sql =" SELECT * FROM product WHERE id='$pid' ";
    $result = $conn->query($sql);
?>
    <table>
        <tr>
            <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc() ) {
            ?>

            <script type="text/javascript">

                function getqty() {
                    var q = document.getElementById("qty").value;
                    var a = "<?= $row['price']?>";

                    var amnt = q * a;
                    document.getElementById("amount").value = amnt;
                }
            </script>
            <form action="cart.php" method="get">
                <td>
                    ID  : <?= $row['id'] ?> <br>
                    Name : <?= $row['name'] ?> <br>
                    Price : <?= $row['price'] ?> <br>
                    Qty  : <input id="qty" type="number" name="qty" min="1" max="10" value="<?= $_GET['qty']?>" onchange="getqty()"> <br><br>
                    Amount :<input type="text" name="amount" id="amount" value="<?=$row['price'] * $_GET['qty'] ?>">
                </td>
                <td>
                    <img src=" <?= $imgurl.$row['image'] ?> " width="150" height="200">
                </td>

                <?php
            }
        } $conn->close();
        ?>
    </tr>
    <tr>
     <td> <input type="submit" name="crtsbmt" value="Add To Cart"> </td>
 </tr>


</form>
</table>
