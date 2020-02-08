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


$admin_id = $_SESSION['user_id'];
$resultado = $conexao->query("SELECT * FROM usuarios WHERE id='$admin_id'");

if(mysqli_num_rows($resultado) > 0){
    while($dados = $resultado->fetch_array()){
        $senha =$dados['senha'];
    }
}

if($tipo == "userUpdateSenha"){
    if($_POST['camfimeSenha']==$senha){
   // tipo=userUpdateSenha&id
   if(mysqli_query($conexao, "update usuarios set senha='sica12345'  where id=$id")){
       header("location:../user_usuario.php?user=$id");
    }else{
       header("location:../user_usuario.php?user=$id");
    }
  }else{
    header("location:../user_usuario.php?user=$id");
  }
}elseif($tipo == "user_ativo"){
  if(mysqli_query($conexao, "update usuarios set atividade='".$_GET['ativo']."'  where id=$id")){
    header("location:../user_usuario.php?user=$id");
 }else{
    header("location:../user_usuario.php?user=$id");
 }
}elseif($tipo == "user_root"){
  if(mysqli_query($conexao, "update usuarios set root='".$_GET['root']."'  where id=$id")){
    header("location:../user_usuario.php?user=$id");
 }else{
    header("location:../user_usuario.php?user=$id");
 }
}//elseif(){}
?>