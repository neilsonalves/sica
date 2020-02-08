<!--<?php

include("config/conexao.php");
session_start();

if($_SESSION['user_asseco'] != 'true'){
    header('location:login.php');
}
if($_SESSION['root']== 'true'){
  //header('location:user_admin.php');
  //echo "admin ok";
}

  //$id_campo = $_GET['campo'];
  $id_bloco = $_GET['bloco'];
  $user_name = $_SESSION['user'];

  $sql_select_bloco="SELECT * FROM blocos WHERE id=$id_bloco";
  $result_select_bloco = mysqli_query($conexao,$sql_select_bloco);
  while($row = mysqli_fetch_array($result_select_bloco)) {
    $id_campo = $row['id_campo'];
    $name = $row['username'];
    $distancia = $row['distancia'];
    $lagura = $row['lagura'];
  }
  
  $sql_select_campo="SELECT * FROM campos WHERE id=$id_campo";
  $sql_select_dispositivos="
  select dispositivo_usando.id, dispositivos.identificacao as username 
  from dispositivo_usando,blocos,dispositivos 
  where dispositivo_usando.id_bloco=blocos.id and dispositivo_usando.id_dispositivo=dispositivos.id and blocos.id='$id_bloco'
  ";
  
  $result_select_campo = mysqli_query($conexao,$sql_select_campo);
  $result_select_dispositivos = mysqli_query($conexao,$sql_select_dispositivos);

  while($row = mysqli_fetch_array($result_select_campo)) {
    $campo_name = $row['username'];
  }

?>-->

<!DOCTYPE html>
<html lang="pt-br">
  <head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>.:SICA:.</title>
  
  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">


  <!-- Custom fonts for this template-- >
  <link href="css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-- >
  <link href="css/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-- >
  <link href="css/sb-admin.css" rel="stylesheet">


  <!--link href="css/bootstrap.css" rel="stylesheet"-->
  <link href="css/base.css" rel="stylesheet">

  

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
<div class="col">
    <a class="navbar-brand mr-1" href="index.php">SICA</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

</div>

    <!-- Navbar(menu superior) -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <?php echo "<span class='nav-link active'>Bem vindo,  $user_name</span>";?>
        <!--<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="usuario.php">Usuario</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Sair</a>
        </div>-->
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar(menu esquedo) -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="index.php">
          <!--i class="fas fa-fw fa-tachometer-alt"></i-->
          <span>HOME</span>
        </a>
      </li>
      <li class="nav-item dropdown active">
        <!--a class="nav-link dropdown" href="campos.php"-->
          <span class="nav-link dropdown">CAMPOS</span>
      </li>

      <?php
        if($_SESSION['root']== '1'){
          echo "
          <li class='nav-item dropdown'>
            <a class='nav-link dropdown' href='usuarios.php'>
              <span class=''>USUARIOS</span>
            </a>
          </li>
          ";
          echo "
          <li class='nav-item dropdown'>
            <a class='nav-link dropdown' href='dispositivos.php'>
              <span class=''>DISPOSITIVOS</span>
            </a>
          </li>
          ";
        }
      ?>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span>CONFIGURAÇÕES</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <span>CONFIGURAÇÕES</span>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="usuario.php">USUARIO</a>
            <a class="dropdown-item" href="#">SOBRE</a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Sair</a>
          </div>
      </li>
    </ul>

    <div id="content-wrapper">
      <div class="container-fluid">
        <!-- Breadcrumbs(menu de navegação)-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
          <a href="campos.php">
            <span>Campos</span>
            </a>            
          </li>
          <li class="breadcrumb-item">
          <?php echo "
          <a href='campo.php?campo=$id_campo'>
            <span>Campo $campo_name</span>
            </a>      "; ?>      
          </li>
          <li class="breadcrumb-item">
            <span><?php echo "Bloco $name"; ?></span>
            <!--a href="index.php">Painel de Controle</a-->
          </li>

          <!--li class="col"></li>
          <li class="">
          <a class="btn btn-success" href="#">ADD</a>
          </li-->
        </ol>
        <!--area-->
        <?php
          echo "<p>Nome: $name</p>";
          echo "<p>Area: ${distancia}x${lagura}</p>";
        ?>
        <!-- area de blocos -->
        <div class="card mb-3">
          <div class="card-header">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><span>Dispositivos</span></li>
              <li class="col"></li>
              <li class=""><a class="btn btn-success" href="#" data-toggle="modal" data-target="#add">ADD</a></li>
            </ol>
          </div>
          <div class="card-body">                
          <?php
          if($result_select_dispositivos){
            $cont=0;
            while($row = mysqli_fetch_array($result_select_dispositivos)) {
              if($cont==0) echo "<div class='row'>";
              echo "
              <div class='col-xl-3 col-sm-6 mb-3'>
              <div class='card text-white bg-primary h-100' style=''>
                <!--div class='card-header'>Bloco</div-->
                <div class='card-body'>
                  <h5 class='card-title'>Nome: ".$row['username']."</h5>
                </div>
                <div class='card-footer btn-group'>
                <a class='text-white clearfix small z-1 btn' href='dispositivo.php?ardu=".$row['id']."'>Detalhes</a>
                  <button type='button' class='btn b tn-success dropdown-toggle dropdown-toggle-split' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                  <i class='fas fa-bars'></i>
                  </button>
                  <div class='dropdown-menu ' style=''>
                    <a class='dropdown-item' href='dispositivo.php?ardu=".$row['id']."'>Detalhes</a>
                    <a class='dropdown-item' href='#'>Editar</a>
                    <div class='dropdown-divider'></div>
                    <a class='dropdown-item' href='#'>Deletar</a>
                  </div>
                </div>
                </div>
                </div>";
              if($cont!=2){
                  $cont++;
              }else {
                  echo "</div>";
                  $cont=0;
              }
                  }
                  if(($cont!=0)&&($cont<2)) echo "</div>";
                }
        ?>
          </div>
          <div class="card-footer small text-muted"></div>
        </div>
      </div><!-- /.container-fluid -->

<!-- Sticky Footer -->
<footer class="sticky-footer">
  <div class="container my-auto">
    <div class="copyright text-center my-auto">
      <span>Copyright © Website 2019</span>
    </div>
  </div>
</footer>
</div><!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<!-- <a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a> -->

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
  <div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel"><?php echo "$user_name";?></h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">×</span>
    </button>
  </div>
  <div class="modal-body">Que sair da conta,<?php echo "$user_name";?>?</div>
  <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">NÃO</button>
    <a class="btn btn-primary" href="config/sair.php">SIM</a>
  </div>
</div>
</div>
</div>

<!-- add -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">ADD Dispositivo</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">
    <form id="formadd" name="formadd" method="POST" action="">
    <div class="form-group">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="addnome" name="addnome" class="form-control" placeholder="Nome" required="required">
                <label for="addnome">Indentificação</label>
              </div>
            </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">NÃO</button>
            <button class="btn btn-success" type="submit">ADD</button>
          </div>
          <!--button class="btn btn-primary btn-block" type="submit">Registro</button-->
        </form>
    </div>
  </div>
  </div>
</div>


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <!-- <script src="vendor/chart.js/Chart.min.js"></script> -->
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <!-- <script src="js/demo/chart-area-demo.js"></script> -->
<!-- Bootstrap core JavaScript-- >
<script src="js/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="js/jquery.easing.min.js"></script>

<script src="js/sb-admin.min.js"></script-->

<script src="js/index.js"></script>
<script>
// href="#" data-toggle="modal" data-target="#add"
$(function(){
      $('#formadd').submit(function(){
        var dados;
        // dados = $(this).serialize();
        dados = new FormData(this);
        
        $.ajax({
          type: "POST",
          url: "config/add.php?add=ardu&bloco_id="+<?php echo $id_bloco; ?>,
          data: dados,
          processData: false,
          cache: false,
          contentType: false,
          success: function( data ){
            if(data.indexOf('add') >= 0){
              //alert(data);
              window.location.href = 'bloco.php?bloco='+<?php echo $id_bloco; ?>;
            }else if(data.indexOf('insert_error') >= 0){
              alert("Error:\n"+data);
            }else{
              alert(data);
            }
          }
        });
      return false;
		});
	});
</script>
</body>

</html>
    
</body>
</html>