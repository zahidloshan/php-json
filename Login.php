<?php


$mydata=file_get_contents("self1.txt");
$data=json_decode($mydata);


if(isset($_POST['submit'])) {

	$error="";

     if (empty($_POST['username']) || empty($_POST['password'])) {

			$error="Please Enter username or password";
			
		}
		else {

			for ($i=0; $i < 3; $i++) { 


			if ($_POST['username'] ==  $data[$i]->username && $_POST['password']== $data[$i]->password) {


				session_start();


			
			$_SESSION["username"] = $data[$i]->username;
            $_SESSION["firstname"] = $data[$i]->firstName;

            $_SESSION["lastname"] = $data[$i]->lastname;
            $_SESSION["email"] = $data[$i]->email;
				
			}
		}

            

            echo $_SESSION["username"] . "  " . $_SESSION["firstname"] . " " . $_SESSION["lastname"]." ".  $_SESSION["email"];


            

			

		}

		
		}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<h1>Login</h1>
    <form action="" method="post">
	<input type="text" name="username" placeholder="Enter your username" >
    <input type="password" name="password" placeholder="Enter your password" >
    <input name="submit" type="submit" value="LOGIN">
    <h5>Do you want to <a href="logout.php">logout</a></h5>

    </form>

</body>
</html>