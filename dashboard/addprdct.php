<?php

    session_start();

    include 'header.php';
    echo "<br><br><br><br><br>";

    if (isset($_GET)) {

        require '../db.php';

        $name = $_GET['pname'];
        $dscrptn = $_GET['dscrptn'];
        $price = $_GET['price'];
        $image = $_GET['image'];

        $sql = " INSERT INTO product(name, description, price, image) VALUES ('$name', '$dscrptn', '$price', '$image') ";

            if ($conn->query($sql) === TRUE) {
                echo "Record Inserted Successfully";
                header('Location: products.php');
            }

             $conn->close();
         }
 ?>

    <form action="addprdct.php" method="get" class="addform">
        <table>
            <tr>
                <td> Product Name : </td>
                <td> <input type="text" name="pname"> </td>
            </tr>
            <tr>
                <td> Description :  </td>
                <td> <textarea name="dscrptn"> </textarea> </td>
            </tr>
            <tr>
                <td> Price :  </td>
                <td> <input type="text" name="price"> </td>
            </tr>
            <tr>
                <td> Image : </td>
                <td> <input type="text" name="image"> </td>
            </tr>
            <tr>
                <td> <input type="submit" value="Add" name="sbmt"> </td>
                <td> <input type="reset" name="Clear"> </td>
            </tr>
        </table>

    </form>

