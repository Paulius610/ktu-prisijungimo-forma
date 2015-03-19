<?php
$host = 'mysql9.000webhost.com';
$username = 'a4119726_admin';
$password = 'slaptazodis1';
$database = 'a4119726_persons';

$self = $_SERVER['PHP_SELF'];
$ipaddress = ("$_SERVER[REMOTE_ADDR]");

$connect = mysql_connect($host,$username,$password) or die('<p class="error">Unable to connect to the database server at this time.</p>');

mysql_select_db($database,$connect) or die('<p class="error">Unable to connect to the database at this time.</p>');

if(isset($_POST['submit'])) {
    if(empty($_POST['email']) || empty($_POST['password']) ) {
        echo('Nesuvedėte visų reikiamų duomenų');
    }
    else {
        $email = htmlspecialchars(mysql_real_escape_string($_POST['email']));
        $password = htmlspecialchars(mysql_real_escape_string($_POST['password']));

        $sql = "SELECT email, password FROM WHERE email='$email', password='$password';";
        $query = @mysql_query($sql);
        $rows = mysql_num_rows($query);


        if ($rows==1) {
            echo("valio");
            header("Location: http://google.com");
        }

        else {
            header("Location: http://google.com");
        }
    }
}
?>