<?php 
	include_once("SessionMngt.class.php");
	include('../db/db_connect.php');
	include('PasswordHash.class.php');
	
	if(SessionMngt::checkLoginState($dbh)){
        header("location: ../Noteboard/index.php");
     }
	
	$errors = array();
	
	if (isset($_POST['username'])) {
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password_1 = $_POST['password_1'];
		$password_2 = $_POST['password_2'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
		if ($password_1 !== $password_2) {
			array_push($errors, "The two passwords do not match");
			
		}	

		$uppercase = preg_match('@[A-Z]@', $password_1);
		$lowercase = preg_match('@[a-z]@', $password_1);
		$number    = preg_match('@[0-9]@', $password_1);

		if(!$uppercase || !$lowercase || !$number || strlen($password_1) < 8) {
			array_push($errors, "password does not match criteria ( a lowercase Letter, a capital letter, a number, Minimum 8 characters");
		}
		

		if (empty($firstname)) { array_push($errors, "First name is required"); }
		if (empty($lastname)) { array_push($errors, "Last name is required"); }
		




		$query = "SELECT * FROM users WHERE username = :username OR email = :email LIMIT 1";
		
		$stmt = $dbh->prepare($query);
        $stmt->execute(array(':username' => $username, ':email' => $email));

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		



		if ($row) { 
			if ($row['username'] === $username) {
			  array_push($errors, "Username already exists");
			  
			}
			if ($row['email'] === $email) {
			  array_push($errors, "email already exists");
			  
			}
		}
		
		if (count($errors) == 0) {
			$password = PasswordHash::generatePassword($password_1);
			


			$query = "INSERT INTO users (username, password, email, firstname, lastname) 
					  VALUES( :username, :password, :email, :firstname, :lastname)";
			
			$stmt = $dbh->prepare($query);

			$stmt->execute(array(':username' => $username, ':password' => $password,
			':email' => $email, ':firstname' => $firstname, ':lastname' => $lastname));

			$_SESSION['username'] = $username;
			$_SESSION['password'] = $password;
			$_SESSION['success'] = "You are now logged in";
			header('location: login.php');
		 }else {
			$_SESSION['error'] = $errors;
			header('location: ../frontend/registration.php');
		 }
	}

?>