<?php
$host = 'mysql9.000webhost.com';
$username = 'a4119726_admin';
$password = 'slaptazodis1';
$database = 'a4119726_persons';

$self = $_SERVER['PHP_SELF'];
$ipaddress = ("$_SERVER[REMOTE_ADDR]");

$connect = mysql_connect($host,$username,$password) or die('<p class="error">Unable to connect to the database server at this time.</p>');

mysql_select_db($database,$connect) or die('<p class="error">Unable to connect to the database at this time.</p>');

if(empty($_POST['email2']) || empty($_POST['password2']) || empty($_POST['password1']) || empty($_POST['email1']) || empty($_POST['username'])) {
    echo('Nesuvedėte visų reikiamų duomenų');
}
else {
    $username = stripslashes($_POST['username']);
    $password1 = stripslashes($_POST['password1']);
    $password2 = stripslashes($_POST['password2']);
    $email1 = stripslashes($_POST['password2']);
    $email2 = stripslashes($_POST['password2']);

    $username = mysql_real_escape_string($username);
    $password1 = mysql_real_escape_string($password1);
    $password2 = mysql_real_escape_string($password2);
    $email1 = mysql_real_escape_string($email1);
    $email2 = mysql_real_escape_string($email2);


    if ($email1 == $email2 && $password1 == $password2) {

        $sql = "SELECT * FROM db WHERE email='$email' or username='$username';";
        $result = mysql_query($sql);
        $count = mysql_num_rows($result);

        if ($count == 1) {
            echo("valio");
            header("Location: http://google.com");
        } else {
            header("Location: http://bing.com");
        }
    }
}
?>