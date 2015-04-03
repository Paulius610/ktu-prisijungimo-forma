<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
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
<?php
include ('db.php'); // for db details
	 
	$connect=mysql_connect($host,$username,$password) or die('<p class="error">Unable to connect to the database server at this time.</p>');
	 
	mysql_select_db($database,$connect) or die('<p class="error">Unable to connect to the database at this time.</p>');

	$veiksmas = htmlspecialchars(mysql_real_escape_string($_POST['veiksmas']));
	
	
	if ($veiksmas=='signup') {
		$usernameErr = $firstnameErr = $lastnameErr = $emailErr = $passwordErr = "";
		$usernameup = $firstname = $lastname = $email = $signuppassword = "";
		$a1=$a2=$a3=$a4=$a5=0;
		
		if (empty($_POST["signupusername"])) {
		 $usernameErr = "Username is required";
		 $a1=1;
		}
		else {
			$usernamee = htmlspecialchars(mysql_real_escape_string($_POST['signupusername']));
			if (!preg_match("/[^A-Za-z0-9]/",$usernamee)) {
				$usernameup = htmlspecialchars(mysql_real_escape_string($_POST['signupusername']));
				$a1=0;
			}
			else {				
				$usernameErr = "Only letters and digits allowed";
				$a1=1;
			}
		}
	   
	   if (empty($_POST["firstname"])) {
		 $firstnameErr = "Firstname is required";
		 $a2=1;
		}
		else {
			$firstnamee = htmlspecialchars(mysql_real_escape_string($_POST['firstname']));
			if (!preg_match("/[^A-Za-z]/",$firstnamee)) {				
				$firstname = htmlspecialchars(mysql_real_escape_string($_POST['firstname']));
				$a2=0;
			}
			else {
				$firstnameErr = "Only letters allowed";
				$a2=1;
			}
		}
		
		if (empty($_POST["lastname"])) {
		 $lastnameErr = "Lastname is required";
		 $a3=1;
		}
		else {
			$lastnamee = htmlspecialchars(mysql_real_escape_string($_POST['lastname']));
			if (!preg_match("/[^A-Za-z]/",$lastnamee)) {
				$lastname = htmlspecialchars(mysql_real_escape_string($_POST['lastname']));
				$a3=0;
			}
			else {
				$lastnameErr = "Only letters allowed";
				$a3=1;
			}
		}
	   
	   if (empty($_POST["email"])) {
		 $emailErr = "Email is required";
		 $a4=1;
	   }
		else {
			$emaile = htmlspecialchars(mysql_real_escape_string($_POST['email']));
			if (filter_var($emaile, FILTER_VALIDATE_EMAIL)) {
				$email = htmlspecialchars(mysql_real_escape_string($_POST['email']));
				$a4=0;
			}
			else{
				$emailErr = "Invalid email format";
				$a4=1;
			}
	   }
		 
	   if (empty($_POST["signuppassword"])) {
		 $passwordErr = "Password is required";
		 $a5=1;
		}
		else {
			$passworde = htmlspecialchars(mysql_real_escape_string($_POST['signuppassword']));
			if (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#",$passworde)) {
				$passwordlogin = htmlspecialchars(mysql_real_escape_string($_POST['signuppassword']));
				$a5=0;
			}
			else {
				$passwordErr = "Password must be 8-20 characters long, have at least one small letter, capital letter and number";
				$a5=1;
			}
		}
		
		
		
	}
	if ($veiksmas=='newpassword') {
		$a=0;
		if (empty($_POST["newpassword"])) {
			 $newpasswordErr = "Password is required";
			 $a=1;
			}
			else {
				$newpassworde = htmlspecialchars(mysql_real_escape_string($_POST['newpassword']));
				if (preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).*$#",$newpassworde)) {
					$newpassword = htmlspecialchars(mysql_real_escape_string($_POST['newpassword']));
					$a=0;
				}
				else {
					$newpasswordErr = "Password must be 8-20 characters long, have at least one small letter, capital letter and number";
					$a=1;
				}
			}
	}
?>
        <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px">
						<a href="#" onClick="$('#loginbox').hide(); $('#signupbox').hide(); $('#successsignup').hide(); $('#login-alert').hide(); $('#signupalert').hide(); $('#rememberbox').show(); $('#remember-alert').hide(); $('#remember-success').hide()">Forgot password?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
						<div style="display:none" id="successsignup" class="alert alert-success col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" action="login.php"  method="post">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="loginusername" placeholder="Username" value="<?php if (isset($_POST['loginusername'])){ echo htmlentities($_POST['loginusername']);}?>">                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="loginpassword" placeholder="Password">
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
									  <button id="btn-login" type="submit" class="btn btn-success">Login</button>
                                      <!--<a id="btn-fblogin" href="#" class="btn btn-primary">Login with Facebook</a>-->

                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Don't have an account! 
                                        <a href="#" onClick="$('#loginbox').hide(); $('#signupbox').show(); $('#successsignup').hide(); $('#login-alert').hide(); $('#signupalert').hide(); $('#remember-alert').hide(); $('#remember-success').hide()">
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
							    <a id="signinlink" href="#" onclick="$('#signupbox').hide(); $('#loginbox').show(); $('#successsignup').hide(); $('#login-alert').hide(); $('#signupalert').hide(); $('#remember-alert').hide(); $('#remember-success').hide()">Sign In</a>
							</div>
                        </div>  
                        <div class="panel-body" >
						<p><span class="error">* required field.</span></p>
                            <form id="signupform" class="form-horizontal" role="form" action="login.php"  method="post">
                                
                                <div id="signupalert" style="display:none" class="alert alert-danger">
                                    <p>Error:</p>
                                    <span></span>
                                </div>
                                    
                                
                                <div class="form-group">
                                    <label for="username" class="col-md-3 control-label">Username</label>
									<span class="error">* <?php echo $usernameErr;?></span>
                                    <div class="col-md-9">
                                        <input id="signup-username" type="text" class="form-control" name="signupusername" placeholder="Username" value="<?php if (isset($_POST['signupusername'])){ echo htmlentities($_POST['signupusername']);}?>">
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <label for="firstname" class="col-md-3 control-label">First Name</label>
									<span class="error">* <?php echo $firstnameErr;?></span>
                                    <div class="col-md-9">
                                        <input id="signup-firstname" type="text" class="form-control" name="firstname" placeholder="First Name" value="<?php if (isset($_POST['firstname'])){ echo htmlentities($_POST['firstname']);}?>">
                                    </div>
                                </div>
								
                                <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Last Name</label>
									<span class="error">* <?php echo $lastnameErr;?></span>
                                    <div class="col-md-9">
                                        <input id="signup-lastname" type="text" class="form-control" name="lastname" placeholder="Last Name" value="<?php if (isset($_POST['lastname'])){ echo htmlentities($_POST['lastname']);}?>">
                                    </div>
                                </div>
								
								<div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
									<span class="error">* <?php echo $emailErr;?></span>
                                    <div class="col-md-9">
                                        <input id="signup-email" type="text" class="form-control" name="email" placeholder="Email Address" value="<?php if (isset($_POST['email'])){ echo htmlentities($_POST['email']);}?>">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Password</label>
									<span class="error">* <?php echo $passwordErr;?></span>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="signuppassword" placeholder="Password">
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
	
	
	<div id="rememberbox" style="display:none; margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Forgot password?</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px">
						<a href="#" onclick="$('#signupbox').hide(); $('#loginbox').show(); $('#successsignup').hide(); $('#login-alert').hide(); $('#signupalert').hide();  $('#rememberbox').hide(); $('#remember-alert').hide(); $('#remember-success').hide()">Sign In</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="remember-alert" class="alert alert-danger col-sm-12"></div>
						<div style="display:none" id="remember-success" class="alert alert-success col-sm-12"></div>
						<div id="rememberform">
                        <p>Enter your registered email address and we'll help you reset your password.</p>
                        <form class="form-horizontal" role="form" action="login.php"  method="post">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="remember-email" type="text" class="form-control" name="email2" placeholder="Registered email"  value="<?php if (isset($_POST['email2'])){ echo htmlentities($_POST['email2']);}?>">
                                    </div>
                        


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
									  <button id="btn-remember" type="submit" class="btn btn-success">Send email</button>

                                    </div>
                                </div>
								
								
								<input type="hidden" name="veiksmas" value="remember">									
                            </form>	
						</div>
						<form id="newpasswordform" style="display:none" class="form-horizontal" role="form" action="login.php"  method="post">
                                    
									
									
                            <div style="margin-bottom: 10px" class="form-group">								
                                    <!--<label for="code" class="col-md-6 control-label">Enter code which we sent to your email: </label>-->
                                    <div class="col-md-9">
                                        <input id="remember-code" type="text" class="form-control" name="code" placeholder="Code from email message"  value="<?php if (isset($_POST['code'])){ echo htmlentities($_POST['code']);}?>">
                                    </div>
                                </div>
								  
							<div style="margin-bottom: 10px" class="form-group">
								<!--<label for="newpassword" class="col-md-6 control-label">Enter new password: </label>-->
								<span class="error"><?php echo $newpasswordErr;?></span>
								<div class="col-md-9">
									<input id="remember-newpassword" type="password" class="form-control" name="newpassword" placeholder="Enter new password">									
								</div>
							</div>
							
							<!--<div style="margin-bottom: 10px" class="form-group">
								<label for="newpassword2" class="col-md-6 control-label">Enter new password again: </label>
								<div class="col-md-9">
									<input id="remember-newpassword2" type="password" class="form-control" name="newpassword2" placeholder="Enter new password again">
								</div>
							</div>-->


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
									  <button id="btn-remember2" type="submit" class="btn btn-success">Change password</button>

                                    </div>
                                </div>
								
								
								<input type="hidden" name="veiksmas" value="newpassword">								
                            </form>


                        </div>                     
                    </div>  
        </div>
<?php
	session_start();
	include ('db.php'); // for db details
	 
	$connect=mysql_connect($host,$username,$password) or die('<p class="error">Unable to connect to the database server at this time.</p>');
	 
	mysql_select_db($database,$connect) or die('<p class="error">Unable to connect to the database at this time.</p>');

	$veiksmas = htmlspecialchars(mysql_real_escape_string($_POST['veiksmas']));
	
	if ($veiksmas=='signup') {
		if ($a1==1 || $a2==1 || $a3==1 || $a4==1 || $a5==1){
		   echo "<script type='text/javascript'>
						document.getElementById(\"signupalert\").innerHTML=\"<p>You did not fill all required fields correctly</p>\";
						$('#signupalert').show();
						$('#signupbox').show();
						$('#loginbox').hide();
						</script>";
		}
		if ($a1==0 && $a2==0 && $a3==0 && $a4==0 && $a5==0){
			$id = md5($usernameup);
			$salt = $id;
			$hash = crypt($passwordlogin, $salt);
			$sql = "SELECT username from users WHERE username='$usernameup' OR email='$email';";
			$result = mysql_query($sql);
			$rowcount=mysql_num_rows($result);
			if ($rowcount==0){
				$sql = "INSERT INTO users SET username='$usernameup', firstname='$firstname', lastname='$lastname', email='$email', password='$hash', id='$id';";
				//echo $sql;
				$result = mysql_query($sql);
				echo "<script  type='text/javascript'>
				document.getElementById(\"successsignup\").innerHTML=\"<p>Success: You have registered successfully.\";
				$('#successsignup').show();
				</script>";
			}
			else {
				echo "<script  type='text/javascript'>
				document.getElementById(\"signupalert\").innerHTML=\"<p>Error: Username or email address has already been used.</p>\";
				$('#signupalert').show();
				$('#signupbox').show();
				$('#loginbox').hide();
				</script>";
			}
		}
	}
	
	
	if ($veiksmas=='signin') {
		$username2 = htmlspecialchars(mysql_real_escape_string($_POST['loginusername']));
		$password2 = htmlspecialchars(mysql_real_escape_string($_POST['loginpassword']));
		$sql = "SELECT username, password, id FROM users WHERE username='$username2'";
		$result = mysql_query($sql);
		$row = mysql_fetch_row($result);		
		$id=$row[2];
		$username=$row[0];
		$password=$row[1];
		$salt = $id;
		$hash = crypt($password2, $salt);
		if ($password==$hash){
			echo "<script  type='text/javascript'>
			document.getElementById(\"successsignup\").innerHTML=\"<p>Success: You have logged in successfully.\";
			$('#successsignup').show();
			</script>";
		}
		else {
			echo "<script  type='text/javascript'>
			document.getElementById(\"login-alert\").innerHTML=\"<p>Alert: Your username and password do not match.\";
			$('#login-alert').show();
			</script>";
		}
	}

	if ($veiksmas=='remember') {
		$_SESSION['email2'] = htmlspecialchars(mysql_real_escape_string($_POST['email2']));
		$email2=$_SESSION['email2'];
		$sql = "SELECT password from users WHERE email='$email2'";
		//echo $sql;
		$result = mysql_query($sql);
		//var_dump($result);
		$rowcount=mysql_num_rows($result);
		if ($rowcount==1){
			$_SESSION['code'] = substr(md5(rand()),-8);
			$sql = "SELECT username FROM users WHERE email='$email2'";
			$result = mysql_query($sql);
			$row = mysql_fetch_row($result);
			$username=$row[0];$to = $_SESSION['email2'];
			$subject = "Code for creating new password";

			 $message = "
			 <html>
			 <head>
			 <title>Code for creating new password</title>
			 </head>
			 <body>
			 <p>Hi!
			 <br><br>
			 Code for new password is <b>".$_SESSION['code']."</b>.
			 <br>
			 Your username is <b>".$username."</b>.
			 <br><br><br>
			 Best wishes,
			 <br>
			 Paulius</p>
			 </body>
			 </html>
			 ";
			 $headers = "MIME-Version: 1.0" . "\r\n";
			 $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

			 $headers .= 'From: <code@forreset.com>' . "\r\n";

			 if (mail($to,$subject,$message,$headers)){			
				echo "<script  type='text/javascript'>
				document.getElementById(\"remember-success\").innerHTML=\"<p>Success: Your code for creating new password is being sent to your email.\";
				$('#remember-success').show();
				$('#loginbox').hide();
				$('#rememberbox').show();
				$('#newpasswordform').show();
				$('#rememberform').hide();
				</script>";
			}
	}
		else {
			echo "<script type='text/javascript'>
			document.getElementById(\"remember-alert\").innerHTML='<p>Alert: We couldn\'t find an account using that email address. Try again or  <a href=\"#\" onClick=\"$(\'#loginbox\').hide(); $(\'#signupbox\').show(); $(\'#successsignup\').hide(); $(\'#login-alert\').hide(); $(\'#signupalert\').hide(); $(\'#remember-alert\').hide(); $(\'#remember-success\').hide(); $(\'#rememberbox\').hide();\"> create a new account</a>.</p>';
			$('#remember-alert').show();
			$('#loginbox').hide();
			$('#rememberbox').show();
			</script>";
		}
	}
	if ($veiksmas=='newpassword') {
		if ($a==0){
		$code=$_SESSION['code'];
		$email2=$_SESSION['email2'];
		$code2 = htmlspecialchars(mysql_real_escape_string($_POST['code']));
		
		$sql = "SELECT id FROM users WHERE email='$email2'";
		$result = mysql_query($sql);
		$row = mysql_fetch_row($result);		
		$id=$row[0];
		$salt = $id;
		$hash = crypt($newpassword, $salt);
		if ($_SESSION['code']==$code2){
			$sql = "UPDATE users SET password='$hash' WHERE email='$email2';";
			$result = mysql_query($sql);
			if($result){
				echo "<script  type='text/javascript'>
				document.getElementById(\"successsignup\").innerHTML=\"<p>Success: Your password has been changed.\";
				$('#successsignup').show();
				$('#newpasswordform').hide();
				$('#rememberform').show();
				</script>";
			}
		}
			else{
				echo "<script type='text/javascript'>
				document.getElementById(\"remember-alert\").innerHTML=\"<p>Alert: Your password hasn't been changed because code is incorrect.\";
				$('#remember-alert').show();
				$('#loginbox').hide();
				$('#rememberbox').show();
				$('#rememberform').hide();
				$('#newpasswordform').show();
				</script>";
			}
		}
		if ($a==1){
			echo "<script type='text/javascript'>
			document.getElementById(\"remember-alert\").innerHTML=\"<p>Alert: Your password hasn't been changed.\";
			$('#remember-alert').show();
			$('#loginbox').hide();
			$('#rememberbox').show();
			$('#rememberform').hide();
			$('#newpasswordform').show();
			</script>";
		}
	}
?>
</body>
</html>