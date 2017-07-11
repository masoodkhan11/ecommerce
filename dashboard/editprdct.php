<?php

    session_start();

    require '../db.php';

    $id = $_REQUEST['id'];

    if ( isset($_POST["submit"]) ) {

        $name = $_POST['pname'];
        $dscrptn = $_POST['dscrptn'];
        $price = $_POST['price'];
        $image = $_POST['image'];

       $sql = "UPDATE product SET name='$name', description='$dscrptn', price=$price, image='$image' WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully ";
            echo '<a href="products.php"> Back to Products </a>';
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }

    $sql ="SELECT * FROM product WHERE id='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

?>

    <form action="editprdct.php" method="post" class="editform">
        <input type="hidden" name="id" value="<?= $id ?>" />
        <table>
            <tr>
                <td> Product Name : </td>
                <td> <input type="text" name="pname" value="<?= $row['name']?>" > </td>
            </tr>
            <tr>
                <td> Description :  </td>
                <td> <textarea name="dscrptn" > <?= $row['description']?> </textarea> </td>
            </tr>
            <tr>
                <td> Price :  </td>
                <td> <input type="text" name="price" value="<?= $row['price']?>" > </td>
            </tr>
            <tr>
                <td> Image : </td>
                <td> <input type="text" name="image" value="<?= $row['image']?>" > </td>
            </tr>
            <tr>
                <td> <input type="submit" name="submit" value="Update"> </td>
                <td> <input type="reset" name="Clear"> </td>
            </tr>
        </table>

    </form>
<?php
   }
} else {
    echo("pass an id");
}

?>
