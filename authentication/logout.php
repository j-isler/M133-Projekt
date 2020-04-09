<?php
include_once("SessionMngt.class.php");
include_once("../db/db_connect.php"); 

SessionMngt::deleteCookie();

header('location: ../frontend/login.php');

?>