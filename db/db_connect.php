<?php
   
   
   // legacy db connect needs to be changed as soosn as register is rewritten
   define('DB_SERVER', 'db:3306');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', 'mariadb');
   define('DB_DATABASE', 'noteboard');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);


   
   
   
   ini_set('display_errors',1);
   ini_set('display_startup_errors', 1);
   error_reporting(E_ALL);
   

   $dbh = new PDO('mysql:host=db;dbname=noteboard', 'root', 'mariadb');

 /*
   $stmt = $dbh->prepare("Select * From users;");
   $stmt->execute();

   $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

   foreach ($rows as $row) {
      echo $row['username'];
   }

*/

?>