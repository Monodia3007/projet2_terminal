<?php
session_start();
unset($_SESSION["pseudo"]);
header("Location:index.php");
?>