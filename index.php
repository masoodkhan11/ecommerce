<?php
    session_start();

    include 'header.php';
    echo "<br><br><br><br><br><br> ";

    if(!isset($_SESSION['name'])){
?>
        <div style="text-align: right">
            <a href="dashboard/login.php">
                <button style="background-color: lightblue"> Login </button>
            </a>
            <a href="dashboard/signup.php">
                <button style="background-color: lightblue"> Signup </button>
            </a>
        </div>

<?php
    }
    else{
?>
        <div style="text-align: right">
            Hii <?= $_SESSION['name'] ?>
            <a href="dashboard/logout.php" style="color: blue"> Logout  </a>
        </div>

<?php

    }
    require 'db.php';

    $imgurl = "img/";


    $sql = "SELECT * FROM product";
    $result = $conn->query($sql);

    $nrow = $result->num_rows ;
?>
    <div class="row">
    <?php
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()) {
    ?>
            <div class="box">
                <a href="product.php?pid=<?= $row['id'] ?>">
                    <img src="<?= $imgurl . $row['image'] ?>" />
                    <h3><?php echo $row['name'] ?></h3>
                    <p><?= $row['price'] ?></p>
                </a>
            </div>
    <?php
        }
    } $conn->close();
    ?>
    </div>

