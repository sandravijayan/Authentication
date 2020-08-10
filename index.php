<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8" />
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap.css" />
</head>

<body>
    <div class="container">
        <section>
            <div id="container_demo">
                <a class="hiddenanchor" id="toregister"></a>
                <a class="hiddenanchor" id="tologin"></a>
                <div id="wrapper">
                    <div id="login" class="col-md-6">
                        <form method="post" name="login" action="">
                            <h1 align="center">Log in</h1>
                            <div class="form-group">
                                <label for="emailsignup" class="youmail" data-icon="e">Email</label>
                                <input id="emailsignup" name="email" required="required" type="email" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="password" class="youpasswd" data-icon="p">Password </label>
                                <input id="password" name="password" required="required" type="password" class="form-control" />
                            </div>
                            <div class="form-group">
                                <input type="submit" name="login" value="Login" /> Not a member? <a href="register.php">Sign Up</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
<?php
include_once 'AuthFunction.php';

$funObj = new AuthFunction();

if (!empty($_POST['login']) && $_POST['login']) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$user = $funObj->login($email, $password);
	if ($user) {
		// If registration success then go to home page.
		header("location:homepage.php");

	} else {
		// If registration failed return error message.
		echo "<script>alert('Email / Password Not Match')</script>";
	}
}