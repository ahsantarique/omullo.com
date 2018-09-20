<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'wwwomullo_ahsantarique');
   define('DB_PASSWORD', 'qwer!@#$');
   define('DB_DATABASE', 'wwwomullo_main');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die('unable to connect');
?>