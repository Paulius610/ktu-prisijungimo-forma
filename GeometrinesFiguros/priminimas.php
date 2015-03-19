<?php
$host = 'mysql3.000webhost.com';
$username = 'a1952851_a195285';
$password = 'slaptazodis1';
$database = 'db';

$self = $_SERVER['PHP_SELF'];
$ipaddress = ("$_SERVER[REMOTE_ADDR]");

$connect = mysql_connect($host,$username,$password) or die('<p class="error">Unable to connect to the database server at this time.</p>');

mysql_select_db($database,$connect) or die('<p class="error">Unable to connect to the database at this time.</p>');

if(isset($_POST['submit'])) {
    if(empty($_POST['email']){
        echo('Nesuvedėte visų reikiamų duomenų');
    }
    else {
        $email = htmlspecialchars(mysql_real_escape_string($_POST['email']));

        $sql = "SELECT email FROM WHERE email='$email';";

        if ($rows==1) {
            echo("Priminimas dėl slaptažodžio išsiųstas");
        }

        else {
            echo("Toks el. paštas neegzistuoja");
        }
    }
}
?>
