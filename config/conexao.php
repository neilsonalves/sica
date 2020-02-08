<?php
    
    $servidor = "localhost:3306";
    $usuario = "root";
    $senha = "";
    $database = "sica2";

    $conexao = mysqli_connect($servidor, $usuario, $senha, $database);

    if(mysqli_connect_error($conexao)){
        echo("erro, nao conectado!!");
    }else{
        $sql_select_user = "SELECT * FROM usuarios WHERE root=true;";
        $cont =0;
        $admin_user = mysqli_query($conexao, $sql_select_user);
        while($row = mysqli_fetch_array( $admin_user)) {
            $cont++;
        }
        if ($cont==0) {
            $sql_inset_user = "insert into usuarios(nome, email, senha, atividade,root) values(\"admin\", \"admin@gmail.com\", \"admin12345\", true, true);";
            mysqli_query($conexao, $sql_inset_user);
        }else{
            //echo "err $cont";
        }
    }

?>