<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8" />
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap.css" />
</head>

<body>
    <div class="container">
        <section>
            <div id="container_demo">
                <a class="hiddenanchor" id="toregister"></a>
                <a class="hiddenanchor" id="tologin"></a>
                <div id="wrapper">
                    <div id="register" class="col-md-6">
                        <form name="login" method="post" action="">
                            <h1 align="center"> Sign up </h1>
                            <div class="form-group">
                                <label for="emailsignup" class="uname" data-icon="e">Email</label>
                                <input id="emailsignup" name="email" required="required" type="email" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="usernamesignup" class="uname" data-icon="u">First Name</label>
                                <input id="usernamesignup" name="firstname" required="required" type="text" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="usernamesignup" class="uname" data-icon="u">Last Name</label>
                                <input id="usernamesignup" name="lastname" required="required" type="text" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="passwordsignup" class="youpasswd" data-icon="p">Password</label>
                                <input id="passwordsignup" name="password" required="required" type="password" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="usernamesignup" class="youmail" data-icon="u">DOB</label>
                                <input id="usernamesignup" min='1930-01-01' max='2020-08-30' name="dob" required="required" type="date" class="form-control" />
                            </div>
                            <div class="form-group">
                                <input type="submit" name="register" value="Sign up" /> Already a member?
                                    <a href="index.php" class="to_register"> Go and log in </a>
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

if (isset($_POST['register']) && $_POST['register']) {

	$email = $_POST['email'];
	$password = $_POST['password'];
	$firstName = $_POST['firstname'];
	$lastName = $_POST['lastname'];
	$dob = $_POST['dob'];
	$checkEmailExist = $funObj->isUserExist($email);

	if (empty($checkEmailExist)) {

		$register = $funObj->userRegister($email, $firstName, $lastName, $password, $dob);
		if ($register) {
			echo "<script>alert('Registration Successful')</script>";
            header("location:index.php");
		} else {
			echo "<script>alert('Registration Not Successful')</script>";
		}

	} else {
		echo "<script>alert('Email Already Exist')</script>";
	}

}