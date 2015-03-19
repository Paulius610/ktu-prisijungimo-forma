<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>

<body>

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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<div class="container">
    <div class="row vertical-offset-100">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Prašome prisijungti</h3>
                </div>
                <div class="panel-body">
                    <form accept-charset="UTF-8" role="form" action="<?php $self ?>" method="post">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="El. paštas" name="email" type="text">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Slaptažodis" name="password" type="password" value="">
                            </div>
                            <button type="button" class="btn btn-link"><a href="priminimas.html">Parmišau duomenis</a></button>
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Prisijungti">

                            <a class="btn btn-lg btn-primary btn-block" href="registracija.html" role="button">Registracija</a>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>