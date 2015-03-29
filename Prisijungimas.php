<!DOCTYPE html>
<html><head lang="en">
    <meta charset="UTF-8">
    <title>JM</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

</head>
<body>
<br>

<div align="center">

    <img width="12%" height="12%" alt="jm" src="images/jm.png"><br><br>

    <?php
    error_reporting(E_ALL);

    $self = $_SERVER['PHP_SELF'];
    $ipaddress = ("$_SERVER[REMOTE_ADDR]");

    include('db.php');

    $connect = mysql_connect($host,$username,$password) or die('<p class="error">Unable to connect to the database server at this time.</p>');

    mysql_select_db($database,$connect) or die('<p class="error">Unable to connect to the database at this time.</p>');



    /// Registracijos php kodas

    if(isset($_POST['registracija'])) {
        if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
            echo('<div align="center" class="alert alert-danger"><p>Neužpildėtete visų langelių!</p></div>');
        }

        else {
            $name = htmlspecialchars(mysql_real_escape_string($_POST['name']));
            $pass = htmlspecialchars(mysql_real_escape_string($_POST['password']));
            $email = htmlspecialchars(mysql_real_escape_string($_POST['email']));

            $query = "SELECT `nick` FROM `users` WHERE nick='$name';";

            $check = @mysql_query("$query") or die('<p class="error">Nepavyko gauti duomenų iš duomenų bazės.</p>');

            $sql = "INSERT INTO users SET nick='$name', email='$email', password='$pass', rank='0';";


            /// tikrina ar dar nėra tokio vartotojo vardo
            $nr = mysql_num_rows($check);

            if($nr > 0){
                echo('<div align="center" class="alert alert-danger">Toks vartotojo vardas jau užimtas!</div>');
            }

            /// įrašo duomenis į duomenų bazę


            else{
            if (@mysql_query($sql)) {
                echo('<div align="center" class="alert alert-success"><p class="success">Registracija sekminga!</p></div>');
            } else {
                echo('<p class="error">Error!</p>');
                echo mysql_error();

            }
        }}
    }

    /// Prisijungimo Php kodas

    if(isset($_POST['prisijungimas'])){
        if(empty($_POST['name']) || empty($_POST['password'])){
            echo('<div align="center" class="alert alert-danger"><p>Neužpildėte visų langelių!</p></div>');
        }

        else{
            $pname=htmlspecialchars(mysql_real_escape_string($_POST['name']));
            $ppassword =htmlspecialchars(mysql_real_escape_string($_POST['password']));

            $query = "SELECT `nick`, `password` FROM `users` WHERE nick='$pname';";
            $check = @mysql_query("$query") or die('<p class="error">Nepavyko gauti duomenų iš duomenų bazės.</p>');


            $nr = mysql_num_rows($check);

            ///Tikrina ar toks vartotojas egzistuoja

            if($nr < 1){
                echo('<div align="center" class="alert alert-danger"><p>Tokio vartotojo nėra!</p></div>');
            }

            /// tikrina ar teisingai įvestas slaptažodis

            else{
                while($row = mysql_fetch_assoc($check)) {
                    $password = $row['password'];
                    if($ppassword==$password){
                        echo('<div align="center" class="alert alert-success"><p>Slaptažodis teisingas!</p></div>');
                    }

                    else{
                        echo('<div align="center" class="alert alert-danger"><p>Slaptažodis neteisingas!</p></div>');
                    }
                }
            }
        }
    }

    ?>
    <table class="table table-bordered" style="width: 40%;">

        <td class="alert-info" style="text-align: center">
            <br>

            <h3><strong>Prisijungti!</strong></h3>

        </td>

        <td class="alert-info">
            <form class="form-horizontal" action="<?php $self ?>" method="post">

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
                        <input name="prisijungimas" type="hidden" />
                        <input class="btn btn-primary" type="submit" value="Prisijungti">
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
                        <input name="registracija" type="hidden" />
                        <input class="btn btn-primary" type="submit" value="Registruotis">
                    </div>
                </div>
            </form></td>
    </table>
    <form action="remember.php" >
        <input type="submit" class="btn btn-danger" value="Pamiršote slaptažod&#303;?">
    </form>
</div>




</body></html>