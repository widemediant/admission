
<?php

extract($_POST);

if (!isset($_SESSION['t_admin']))
{
        echo "<br>You are not Logged In Please Login to Access this Page<br>";
        echo "<a href=adminlogin.php>Click Here to Login</a>";
        exit();
}

?>