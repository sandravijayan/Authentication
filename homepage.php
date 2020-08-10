<?php
include_once 'authFunction.php';
if (!empty($_POST['welcome']) && $_POST['welcome']) {
	// remove all session variables
	session_unset();
	// destroy the session
	session_destroy();
}
if (empty($_SESSION)) {
	header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8" />
    <title>Welcome</title>
    <link rel="stylesheet" type="text/css" href="assets/bootstrap.css" />
</head>

<body>
    <div class="container">
        <section>
            <div id="container_demo">
                <a class="hiddenanchor" id="toregister"></a>
                <a class="hiddenanchor" id="tologin"></a>
                <div id="wrapper">
                    <div id="login" class="animate form">
                        <form align="center" height=100 name="login" method="post" action="">
                            <h1 align="center">Welcome Home</h1>
                            <p>
                                <label for="name" class="uname"> Your Name :</label>
                                <?=$_SESSION['name']?>
                            </p>
                            <p>
                                <label for="email" class="uemail"> Your Email :</label>
                                <?=$_SESSION['email']?>
                            </p>
                            <p class="login button">
                                <input type="submit" name="welcome" value="Logout" />
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>