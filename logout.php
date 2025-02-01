<?php require "./includes/components/tailwinder.php";

session_start();

$_SESSION = [];

session_destroy();
header("Location: /disscuss");
exit;
