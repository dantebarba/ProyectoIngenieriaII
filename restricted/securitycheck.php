<?php

function CheckAccess()

{

  $result = (isset($_COOKIE['username']) &&

            $_COOKIE['username'] != '' &&

            $_COOKIE['password'] != '' && $_COOKIE['isAdmin'] == 1);

  if (!$result)

  {

   //header('WWW-Authenticate: Basic realm=“Esta es un area restringida”');

   header('HTTP/1.0 403 Unauthorized');
   exit;
   return false;

  }

  else

   return true;

}


