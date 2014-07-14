<?php
include 'dbconnection.php'; 
$link = connectdb();
include 'queries.php';
q_removeUsuario($_COOKIE['username']);
?>

<script type="text/javascript">
        function logout() {
            window.location.href="/login.php?mode=logout";
        }
<?php
header( 'Location: http://www.ingenieriaii.url.ph');
