<?php
session_start();
session_destroy();
header('location: officer-ep-login.php');
?>