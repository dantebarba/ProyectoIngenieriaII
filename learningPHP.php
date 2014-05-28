<?php
   setcookie("login", $username); #Siempre antes de un echo
   session_start();
   $_SESSION['TEST'] = 1;
   echo isSet($_SESSION['TEST']);
   $test = 'Helloworld';
   echo $test;
   /** SHA1
    * 
    */
   $test_crypted = sha1($test);
   //echo $test_crypted;
   $username = "Dante";
   print_r($_COOKIE);
   echo $_SESSION['TEST'];
   unSet($_SESSION['TEST']);
   session_destroy();
