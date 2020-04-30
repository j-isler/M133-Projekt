<?php
    include_once("../../authentication/SessionMngt.class.php");
    include_once("../../db/db_connect.php");

    if(!SessionMngt::checkLoginState($dbh)){
        header("location:../../frontend/login.php");
    }

    if(isset($_POST['text'])){

        $text = $_POST['text'];
        $id = $_SESSION['user_id'];

        $query = "INSERT INTO notes (text, id_users) VALUES( :text, :id_users)";
		$stmt = $dbh->prepare($query);
		$stmt->execute(array(':text' => $text, ':id_users' => $id));

        header("location:../");


    }else{header("location:../");}

?>