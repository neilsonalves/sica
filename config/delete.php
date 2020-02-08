<?php
    
    include("conexao.php");

    session_start();

    if($_SESSION['user_asseco'] != 'true'){
        header('location:../login.php');
    }
    
    $tipo = $_GET['tipo'];
    $id = $_GET['id'];

    if($tipo =='campo'){
        $sql_campo = "delete from campos where id='$id'";

        if (mysqli_query($conexao, $sql_campo)>0) {
            header('location:../campos.php');
        }else{
            header('location:../campos.php');
        }
    }elseif($tipo =='bloco'){
        $sql_campo = "delete from blocos where id='$id'";

        if (mysqli_query($conexao, $sql_campo)>0) {
            header('location:../campo.php?campo='.$_GET['campo']);
        }else{
            header('location:../campo.php?campo='.$_GET['campo']);
        }
    }
?>