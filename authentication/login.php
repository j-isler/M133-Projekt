<?php
   include_once("../db/db_connect.php");
   include_once("function.php")
?>


<section class="parent">

   <div class="child">
      <?php

         if(!func::checkLoginState($dbh)){
            echo 'Welcome'. $_SESSION['username'] . '!';
         }else{
            header("location: index.php");
         }

      ?>
   </div>

</section>

