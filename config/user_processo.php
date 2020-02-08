<?php

include("conexao.php");
session_start();

if($_SESSION['user_asseco'] != 'true'){
    header('location:../login.php');
}
if($_SESSION['root'] == '0'){
  header('location:../index.php');
}


if($_GET['tipo']=='add_user'){
        
    $name = $_POST["user_name"];
    // $userName = $_POST["lastName"];
    $email = $_POST["user_email"];
    $senha = $_POST["user_senha"];
    $senha_confima = $_POST["user_senha_camfime"];

    if($senha == $senha_confima){
      $sql_add_user = "insert into usuarios(nome, email,senha) values('$name','$email','$senha');";
    
        if(mysqli_query($conexao, $sql_add_user)){
          echo "userAdd";
        }else{
            echo "userErrorAdd";
        }
    }else{
        echo "senhaError";
    }

    // $servername = "localhost";
    // $username = "root";
    // $password = "";
    // $myDB = "sica";

    // try {
    //     $conn = new PDO("mysql:host=$servername;dbname=$myDB", $username, $password);
    //     // set the PDO error mode to exception
    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //     // set the PDO error mode to exception
    //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    //     $sql = "INSERT INTO usuarios(nome, username, email, senha)
    //     values('$name', '$userName', '$email', '$senha')";
        
    //     // use exec() because no results are returned
    //     $conn->exec($sql);
        
    //     echo "New record created successfully";
    //     }
    //     catch(PDOException $e)
    //     {
    //     echo $sql . "<br>" . $e->getMessage();
    //     }
    //     $conn = null;
}

?>