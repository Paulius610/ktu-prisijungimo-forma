<!DOCTYPE html>
<html><head lang="en">
    <meta charset="UTF-8">
    <title>JM</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>

<?php
$self = $_SERVER['PHP_SELF'];
$ipaddress = ("$_SERVER[REMOTE_ADDR]");

include('db.php');

$connect = mysql_connect($host,$username,$password) or die('<p class="error">Unable to connect to the database server at this time.</p>');

mysql_select_db($database,$connect) or die('<p class="error">Unable to connect to the database at this time.</p>');





if(isset($_POST['send'])) {
    if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
        echo('<p align="center" class="error">Neužpild&#279;te vis&#371; langeli&#371;</p>');
    } else {
        $name = htmlspecialchars(mysql_real_escape_string($_POST['name']));
        $pass = htmlspecialchars(mysql_real_escape_string($_POST['password']));
        $email = htmlspecialchars(mysql_real_escape_string($_POST['email']));

        $query = "SELECT `nick` FROM `users`;";

        $check = @mysql_query("$query") or die('<p class="error">Nepavyko gauti duomenų iš duomenų bazės.</p>');

        $sql = "INSERT INTO users SET nick='$name', email='$email', password='$pass', rank='0';";


        /// tikrina ar dar nėra tokio vartotojo vardo
        while($row = mysql_fetch_array($check)){


        $fname = stripslashes($row['nick']);

            if($name == $fname){
                echo('<p aling="center">Toks vartotojo vardas jau užimtas</p>');
                echo('<a align="center" href="prisijungimas.php">Grįžti į registraciją!</a>');
                exit;
            }}

        /// įrašo duomenis į duomenų bazę

        if (@mysql_query($sql)) {
            echo('<p class="success">Registracija sekminga!</p>');
        } else {
            echo('<p class="error">Error!</p>');
            echo mysql_error();

        }
    }
}

?>
<div align="center">

    <h1>Kažkoks logo</h1><br>
    <table class="table table-bordered" style="width: 40%;">

        <td class="alert-info" style="text-align: center">
            <br>

            <h3><strong>Prisijungti!</strong></h3>

        </td>

        <td class="alert-info">
            <form class="form-horizontal">

                <label  class="col-xs-4 control-label">Vardas </label>
                <div class="col-sm-8">
                    <input name="name" type="text" class="form-control"  placeholder="Vardas">
                </div>
                <br><br>


                <label class="col-xs-4 control-label">Slaptažodis </label>
                <div class="col-sm-8">
                    <input name="password" type="password" class="form-control"  placeholder="Slaptažodis">
                </div>

                <br><br>
                <div class="form-group" >
                    <div class="col-sm-14" align="center">
                        <br>
                        <button class="btn btn-primary">Prisijungti</button>
                    </div>
                </div>
            </form></td>
    </table>

    <br><br>

    <table class="table table-bordered" style="width: 40%;">

        <td class="alert-danger" style="text-align: center">
            <br>

            <h3><strong>Registruotis!</strong></h3>

        </td>

        <td class="alert-danger">
            <form class="form-horizontal"  action="<?php $self ?>" method="post">

                <label for="name"  class="col-xs-4 control-label">Vardas </label>
                <div class="col-sm-8">
                    <input name="name" type="text" class="form-control"  placeholder="Vardas">
                </div>
                <br><br>


                <label for="password" class="col-xs-4 control-label">Slaptažodis </label>
                <div class="col-sm-8">
                    <input name="password" type="password" class="form-control"  placeholder="Slaptažodis">
                </div>

                <br><br>

                <label for="email" class="col-xs-4 control-label">El.paštas </label>
                <div class="col-sm-8">
                    <input name="email" type="text" class="form-control"  placeholder="El.paštas">
                </div>

                <br><br>

                <div class="form-group" >
                    <div class="col-sm-14" align="center">
                        <br>
                        <input name="send" type="hidden" />
                        <input class="btn btn-primary" type="submit" value="send">
                    </div>
                </div>
            </form></td>
    </table>
    <form action="remember.php" >
        <input type="submit" class="btn btn-danger" value="Pamiršote slaptažod&#303;?">
    </form>
</div>




</body></html>