<?php

include("conexao.php");

session_start();

$email = $_POST["email"];
$senha = $_POST["senha"];
// $usuario = $_GET["user"];
// $senha = $_GET["senha"];

$resultado = $conexao->query("SELECT * FROM usuarios WHERE email='$email' AND senha='$senha'");

if(mysqli_num_rows($resultado) > 0){
    while($dados = $resultado->fetch_array()){
        $user_id =$dados['id'];
        $user_admin =$dados['root'];
        $user_atividade =$dados['atividade'];
        $user = $dados['nome'];
    }
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user'] = $user;
    $_SESSION['user_asseco'] = "true";
    $_SESSION['root'] = $user_admin;
    $_SESSION['atividade'] = $user_atividade;
    echo "login_ok";
}else{
    unset($_SESSION['user_id']);
    unset($_SESSION['user']);
    unset($_SESSION['user_asseco']);
    unset($_SESSION['root']);
    unset($_SESSION['atividade']);
    echo "login_error";
    // header('location:index.html');
}

?>