<?php
$host = 'localhost';
$username = 'root';
$password = 'root';
$database = 'db';

$self = $_SERVER['PHP_SELF'];
$ipaddress = ("$_SERVER[REMOTE_ADDR]");

$connect = mysql_connect($host,$username,$password) or die('<p class="error">Unable to connect to the database server at this time.</p>');

mysql_select_db($database,$connect) or die('<p class="error">Unable to connect to the database at this time.</p>');

    if(empty($_POST['email']) || empty($_POST['password']) ) {
        echo('Nesuvedėte visų reikiamų duomenų');
    }
    else {
        $email = stripslashes($_POST['email']);
        $password = stripslashes($_POST['password']);
        $email = mysql_real_escape_string($email);
        $password = mysql_real_escape_string($password);

        $sql = "SELECT * FROM db WHERE email='$email' and password='$password';";
        $result = mysql_query($sql);
        $count = mysql_num_rows($result);

        if ($count==1) {
            echo("valio");
            header("Location: http://google.com");
        }

        else {
            header("Location: http://bing.com");
        }
    }
?>