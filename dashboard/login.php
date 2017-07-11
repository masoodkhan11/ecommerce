<?php
    session_start();

    include 'header.php';

    if(isset($_SESSION['name'])) {
        header("Location: index.php");
    }

 ?>
    <br><br><br><br><br><br>
    <div style="text-align: right">
        didn't signup yet?
        <a href="signup.php">
            <button style="background-color: lightblue">Signup </button>
        </a>
    </div>
    <form action="lgnsbmt.php" method="post">
        Email : <input type="text" name="email" required=""> <br><br>
        password : <input type="password" name="pswd" required=""> <br><br>
        <input type="submit" name="sbmt">
        <input type="reset" name="Clear">
    </form>
