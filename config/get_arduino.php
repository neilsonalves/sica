<?php
// ?nome_s=dados1&tipo_s=dados2&dados_s=dados3
include("conexao.php");
// sensor
$nome = $_GET['nome_s'];
$tipo = $_GET['tipo_s'];
$date = date("Y-m-d");// pega a data do sistema


$sql_sensor = "INSERT INTO sensores(nome, tipo) VALUES('$nome', '$tipo')";


// // ?nome_s=teste_s&tipo_s=sensor&dados_s=11111
// echo "$nome<br>$tipo<br>";
echo "<br><br>";

if (mysqli_query($conexao, $sql_sensor)) {
    echo "<p>REGISTRADO com sucesso</p>";
    // --------------------------------------
    $dados = $_GET['dados_s'];
    if(($dados != "") && ($dados != null)){
    $sql_sensor = "SELECT * FROM sensores WHERE nome='$nome' && tipo='$tipo'";
    $sensores = mysqli_query($conexao, $sql_sensor) or die ("Não foi possível realizar a consulta ao banco de dados");
    
    while($row = mysqli_fetch_array( $sensores)) {
        $id_s = $row['id'];
    }
    $sql_dados = "INSERT INTO monitoramento(sensor, data_s, dados) values('$id_s', '$date',' $dados')";
    // --------------------------------------
    if (mysqli_query($conexao, $sql_dados)) {
        echo "<p>adcionado DADOS com successo</p>";
    }else{
        echo "<p>não tem DADOS para adicionar</p>";
    }
}else{
    echo "<p>não tem DADOS para adicionar</p>";
}
} else {
    // --------------------------------------
    $dados = $_GET['dados_s'];
    if(($dados != "") && ($dados != null)){
    $sql_sensor = "SELECT * FROM sensores WHERE nome='$nome' && tipo='$tipo'";
    $sensores = mysqli_query($conexao, $sql_sensor) or die ("<br><br><br><br>Não foi possível realizar a consulta ao banco de dados");
    
    while($row = mysqli_fetch_array( $sensores)) {
        $id_s = $row['id'];
    }
    $sql_dados = "INSERT INTO monitoramento(sensor, data_s, dados) values('$id_s', '$date',' $dados')";
    // --------------------------------------
    if (mysqli_query($conexao, $sql_dados)) {
        echo "<p>adcionado DADOS com successo</p>";
    }else{
        echo "<p>não tem DADOS para adicionar</p>";
    }
}else{
    echo "<p>não tem DADOS para adicionar</p>";
}
}
// --------------------

// $sql = "INSERT INTO monitoramento(nome, tipo, data_s, dados) VALUES('$nome', '$tipo', '$date', '$dados')";

mysqli_close($conexao);
?> 