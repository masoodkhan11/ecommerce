<?php

    include 'header.php';
    echo "<br><br><br><br><br>";

    session_start();

    echo "Item Selected : " .count($_SESSION['cart']);
    echo "<br> Total Amount : " .$_SESSION['total'];
 ?>
<br><br>

<form action="checkout_sbmt.php" method="get" id="usrdtls">
    Provide your Details :- <br>
    <table>
            <tr>
                <td>   Name :  </td>
                <td>   <input type="text" name="name">    </td>
            </tr>
            <tr>
                <td>   Mobile No : </td>
                <td>   <input type="text" name="mobile">  </td>
            </tr>
            <tr>
                <td>   Address : </td>
                <td>  <textarea rows="4" cols="30" form="usrdtls" name="adrs"></textarea> </td>
            </tr>
            <tr>
                <td>  <input type="submit" name="sbmt" value="Submit">
                <td>  <input type="reset"> </td>
            </tr>
    </table>
</form>
