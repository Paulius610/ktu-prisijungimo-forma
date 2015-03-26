<?php
$host = 'localhost';
$username = 'root';
$password = 'root';
$database = 'db';

$self = $_SERVER['PHP_SELF'];
$ipaddress = ("$_SERVER[REMOTE_ADDR]");

$connect = mysql_connect($host,$username,$password) or die('<p class="error">Unable to connect to the database server at this time.</p>');

mysql_select_db($database,$connect) or die('<p class="error">Unable to connect to the database at this time.</p>');

    if(empty($_POST['email'])){
        echo('Nesuvedėte visų reikiamų duomenų');
    }
    else {
        $email = stripslashes($_POST['email']);
        $email = mysql_real_escape_string($email);

        $sql = "SELECT password FROM db WHERE email='$email';";
        $result = mysql_query($sql);
        $count = mysql_num_rows($result);

        if ($count==1) {
            echo("Priminimas dėl slaptažodžio išsiųstas");
        }

        else {
            echo("Toks el. paštas neegzistuoja");
        }
    }

?>
