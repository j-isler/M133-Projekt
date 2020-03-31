<?php
   define('DB_SERVER', 'localhost:3306');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'noteboard');
   $db = new mysqli(DB_SERVER, DB_USERNAME, DB_USERNAME, DB_DATABASE);

   if ($db->connect_errno) {
      echo "Failed to connect to MySQL: " . $db->connect_error;
   }


?>