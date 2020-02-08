<?php


include("config/conexao.php");

session_start();


unset($_SESSION['user']);
unset($_SESSION['user_asseco']);

session_destroy();

session_write_close();

header('location:../login.php')

?>