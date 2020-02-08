<?php

include("conexao.php");
session_start();

if($_SESSION['user_asseco'] != 'true'){
    header('location:login.php');
}
if($_GET['add']=="campo"){

    $sql_add_campo = "insert into campos(id_user, username, lagura, distancia, l_um, d_um, _end) values('".$_SESSION['user_id']."', '".$_POST['addnome']."', '".$_POST['addlagura']."', '".$_POST['adddistancia']."', '".$_POST['addlum']."', '".$_POST['adddum']."','".$_POST['addend']."');";
    // --------------------------------------
    if (mysqli_query($conexao, $sql_add_campo)) {
        header('location:../campos.php');
    }else{
         header('location:../campos.php');
    }
}elseif($_GET['add']=="bloco"){
    $id = $_GET['campo_id'];
    $sql_select_campo = "select * from campos where id=$id";
    $sql_select_blocos = "select * from blocos where id_campo=$id";

    $result_select_campo = mysqli_query($conexao, $sql_select_campo);
    $result_select_blocos = mysqli_query($conexao, $sql_select_blocos);

    function convert_um($um, $n){
        $n = intval($n);
        switch($um){
            case "km":
                return $n*1000;
            case "m":
                return $n;
            case "cm":
                return $n/100;
        }
    }

    while($row = mysqli_fetch_array($result_select_campo)) {
        // $bloco_um = $row['um'];
        $n1 = convert_um($row['d_um'], $row['distancia']);
        $n2 = convert_um($row['l_um'], $row['lagura']);

        $valor_campo = $n1*$n2;
    }
    // km --> m (km*1000)
    // m --> cm (m*100)
    // cm --> m (cm/100)
    $valor_blocos=0;
    while($row = mysqli_fetch_array($result_select_blocos)) {
        $n1 = convert_um($row['d_um'], $row['distancia']);
        $n2 = convert_um($row['l_um'], $row['lagura']);
        $valor_blocos += $n1*$n2;
    }
    if($valor_blocos<=$valor_campo){
        $dist = $_POST['adddistancia'];
        $lagu = $_POST['addlagura'];
        $d_um = $_POST['adddum'];
        $l_um = $_POST['addlum'];

        $new_bloco = convert_um($d_um, $dist)* convert_um($l_um, $lagu);

        $valor_blocos2 = $valor_blocos+$new_bloco;
        if($valor_blocos2<=$valor_campo){
            $sql_add_bloco = "insert into blocos(id_campo, username, lagura, distancia, l_um, d_um) values('".$_GET['campo_id']."','".$_POST['addnome']."','$lagu','$dist','$l_um', '$d_um');";
    
        if(mysqli_query($conexao, $sql_add_bloco)){
            echo "add";
        }else{
            echo "insert_error";
        }
        }else{
            echo "ERROR:\nultrapassou o limite da area de ${valor_campo}m do campo!";
        }
    }else{
        echo "Não pode mais adicionar novos blocos!";
    }
}elseif($_GET['add']=="ardu"){
    // ainda tem que melhora
    $id_bloco = $_GET['bloco_id'];
    $nome = $_POST['addnome'];
    $sql_add_ardu = "insert into arduinos(id_bloco, username) values('$id_bloco','$nome')";
    
    if(mysqli_query($conexao, $sql_add_ardu)){
        echo "add";
    }else{
        echo "Já tem um dispositivo com esta identificação!";
    }
}
?>