<?php 
	include('../db/db_connect.php');
	session_start();
	$errors = [];
	
	if (isset($_POST['username'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		$firstname = mysqli_real_escape_string($db, $_POST['firstname']);
		$lastname = mysqli_real_escape_string($db, $_POST['lastname']);
		
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
			
		}	
		if (empty($firstname)) { array_push($errors, "First name is required"); }
		if (empty($lastname)) { array_push($errors, "Last name is required"); }
		
		$query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
		$result = mysqli_query($db, $query);
		$user = mysqli_fetch_assoc($result);
		
		if ($user) { 
			if ($user['username'] === $username) {
			  array_push($errors, "Username already exists");
			  
			}
			if ($user['email'] === $email) {
			  array_push($errors, "email already exists");
			  
			}
		}
		
		if (count($errors) == 0) {
			$password = md5($password_1);
			
			$query = "INSERT INTO users (username, password, email, firstname, lastname) 
					  VALUES('$username', '$password', '$email', '$firstname', '$lastname')";
			mysqli_query($db, $query);
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		 }
	}

?>