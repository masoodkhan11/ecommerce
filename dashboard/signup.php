<?php

    session_start();

    include 'header.php';
    echo "<br><br><br><br><br>";

    if (isset($_SESSION['name'])) {
        header('Location: index.php');
    }
 ?>
    <div style="text-align: right">
        Already Signup?
        <a href="login.php">
            <button style="background-color: lightblue">Login</button>
        </a>
    </div>

    <form action="sgpsbmt.php" method="post">
        Name : <input type="text" name="name" required> <br><br>
        Email : <input type="text" name="email" required> <br><br>
        Password : <input type="password" name="pswd" required="">  <br><br>
        <input type="submit" name="sbmt">
        <input type="reset" name="Clear">
    </form>
