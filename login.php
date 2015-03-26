<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Login</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-theme.css">
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/npm.js"></script>
<script src="js/jquery.min.js"></script>
</head>
<body>
        <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" action="login.php"  method="post">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="Username">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                    

                                
                            <!--<div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                        </label>
                                      </div>
                                    </div>-->


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
									  <button id="btn-login" type="submit" class="btn btn-sucess">Login</button>
                                      <!--<a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>-->

                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Don't have an account! 
                                        <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                            Sign Up Here
                                        </a>
                                        </div>
                                    </div>
                                </div>
									<input type="hidden" name="veiksmas" value="signin">								
                            </form>     



                        </div>                     
                    </div>  
        </div>
        <div id="signupbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Sign Up</div>
                            <div style="float:right; font-size: 85%; position: relative; top:-10px">
							    <a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show()">Sign In</a>
							</div>
                        </div>  
                        <div class="panel-body" >
                            <form id="signupform" class="form-horizontal" role="form" action="login.php"  method="post">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                    
                                
                                <div class="form-group">
                                    <label for="username" class="col-md-3 control-label">Username</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="username" placeholder="Username">
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">First Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="firstname" placeholder="First Name">
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Last Name</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="email" placeholder="Email Address">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                </div>
								
                                

                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i>Sign Up</button>
                                       <!-- <span style="margin-left:8px;">or</span>  -->
                                    </div>
                                </div>
                                <!--
                               <div style="border-top: 1px solid #999; padding-top:20px"  class="form-group">
                                    
                                    <div class="col-md-offset-3 col-md-9">
                                        <button id="btn-fbsignup" type="button" class="btn btn-primary"><i class="icon-facebook"></i>   Sign Up with Facebook</button>
                                    </div>                                           
                                        
                                </div>
                                -->
                                
                            <input type="hidden" name="veiksmas" value="signup">	    
                            </form>
                         </div>
                    </div>

               
               
                
         </div> 
    </div>

	<?php
include ('db.php'); // for db details
 
$connect=mysql_connect($host,$username,$password) or die('<p class="error">Unable to connect to the database server at this time.</p>');
 
mysql_select_db($database,$connect) or die('<p class="error">Unable to connect to the database at this time.</p>');

$veiksmas = htmlspecialchars(mysql_real_escape_string($_POST['veiksmas']));
if ($veiksmas=='signup') {
	$username = htmlspecialchars(mysql_real_escape_string($_POST['username'])); 
	$firstname = htmlspecialchars(mysql_real_escape_string($_POST['firstname'])); 
	$lastname = htmlspecialchars(mysql_real_escape_string($_POST['lastname']));
	$email = htmlspecialchars(mysql_real_escape_string($_POST['email']));
	$password = htmlspecialchars(mysql_real_escape_string($_POST['password']));
	$sql = "INSERT INTO setup SET username='$username', firstname='$firstname', lastname='$lastname', email='$email', password='$password';";
	//echo $sql;
	$result = mysql_query($sql);
}
if ($veiksmas=='signin') {
	$username = htmlspecialchars(mysql_real_escape_string($_POST['username']));
	$password = htmlspecialchars(mysql_real_escape_string($_POST['password']));
	$sql = "SELECT username, password from setup WHERE username='$username' AND password='$password';";
	//echo $sql;
	$result = mysql_query($sql);
	//var_dump($result);
	$rowcount=mysql_num_rows($result);
	if ($rowcount!=0){
		echo 'Prisijungta';
}
	else {
		echo 'Nepavyko';
	}
}

?>
</body>
</html>