<?php

    session_start();

    include 'header.php';
    echo "<br><br><br><br><br>";

    $imgurl = "../img/";

    require '../db.php';

    echo '<p style="text-align: right"> <a href="index.php"> Home </a> </p> ';
    echo '<a href="addprdct.php"> Add New Product </a> <br><br>';

    $sql = "SELECT * FROM product ORDER BY created_at DESC ";
    $result = $conn->query($sql);

    echo "<table>";

    if($result->num_rows > 0){
        while ($row = $result->fetch_assoc()) {
?>
            <tr>
                <td>
                    <img src="<?= $imgurl . $row['image'] ?>" width=80 height=90>
                    <h4> <?php echo $row['name'] ?> </h4>
                    <p> <?= $row['price'] ?> </p>
                </td>
                <td>
                    <a href="editprdct.php?id=<?= $row['id'] ?>"> edit </a>
                </td>
                <td>
                    <a href="dltprdct.php?id= <?= $row['id'] ?>"> delete </a>
                </td>
            </tr>


<?php
        }
        echo "</table>";
    } $conn->close();

 ?>
