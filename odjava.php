<?php 
session_start();

unset($_SESSION['id']);
unset($_SESSION['ime']);
unset($_SESSION['priimek']);
unset($_SESSION['email']);

header("Location: login.php");
?>