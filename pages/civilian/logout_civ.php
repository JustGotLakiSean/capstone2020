<?php
session_start();
session_destroy();
header('location: civilian-login.php');
?>