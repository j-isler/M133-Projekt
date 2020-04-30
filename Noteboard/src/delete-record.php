<?php
    include_once("../../authentication/SessionMngt.class.php");
    include_once("../../db/db_connect.php");

    if(!SessionMngt::checkLoginState($dbh)){
        header("location:../../frontend/login.php");
    }

    if(isset($_POST['noteid'])){

        $noteid = $_POST['noteid'];

        $query = "DELETE From notes Where id = :noteid";
		$stmt = $dbh->prepare($query);
		$stmt->execute(array(':noteid' => $noteid));

        header("location:../");


    }else{header("location:../");}
