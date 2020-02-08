<?php

include("conexao.php");
session_start();

if($_SESSION['user_asseco'] != 'true'){
    header('location:../login.php');
}
if($_SESSION['root'] == '0'){
  header('location:../index.php');
}


$tipo = $_GET['tipo'];
$id = $_GET['id'];

if($tipo == 'user'){
    if(mysqli_query($conexao, "delete from usuarios where id=$id")){
        // echo "success";
        header("location:../user_usuarios.php");
    }else{
        // echo "error";
        header("location:../user_usuarios.php");
    }
}


?>