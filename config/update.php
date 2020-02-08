<?php

include("conexao.php");
session_start();

if($_SESSION['user_asseco'] != 'true'){
    header('location:login.php');
}
$tipo = $_GET['tipo'];
$id = $_GET['id'];

if($tipo== "user"){
    if(mysqli_query($conexao, "update usuarios set nome='".$_POST['nome']."', email='".$_POST['email']."'  where id=$id")){
        // echo "success";
        header("location:../user_usuario.php?user=$id");
    }else{
        // echo "error";
        header("location:../user_usuario.php?user=$id");
    }
}
?>