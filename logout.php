<?php

session_start();
session_unset();
session_destroy();
header("Location: index.php");
// die('You are logged out');
// if(isset($_GET['logout'])){
//     echo 'Hello world';
// }
