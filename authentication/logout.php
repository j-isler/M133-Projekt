<?php
include_once("function.php");
include_once("../db/db_connect.php"); 

func::deleteCookie();

header('location: ../frontend/login.php');

?>