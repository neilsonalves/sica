<!--<?php

include("config/conexao.php");
session_start();

if($_SESSION['user_asseco'] != 'true'){
    header('location:login.php');
}
if($_SESSION['root'] == '0'){
  header('location:index.php');
  //echo "admin ok";
}


  $user_name = $_SESSION['user'];
  

  $sql_select_materiais="select * from materiais";
  $result_select_materiais = mysqli_query($conexao,$sql_select_materiais);

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


  <!-- Custom fonts for this template-->
  <link href="css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="css/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
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
      <li class="nav-item dropdown ">
        <a class="nav-link dropdown" href="campos.php">
          <span class="">CAMPOS</span>
        </a>
      </li>
      <?php
        if($_SESSION['root']== '1'){
          echo "
          <li class='nav-item dropdown '>
            <a class='nav-link dropdown' href='user_usuarios.php'>
              <span >USUARIOS</span>
            </a>
          </li>
          <li class='nav-item dropdown'>
            <a class='nav-link dropdown' href='user_dispositivos.php'>
              <span class=''>DISPOSITIVOS</span>
            </a>
          </li>
          <li class='nav-item dropdown'>
            <a class='nav-link dropdown' href='user_modelos.php'>
              <span class=''>MODELOS</span>
            </a>
          </li>
          <li class='nav-item dropdown active'>
            <!--a class='nav-link dropdown' href='user_materiais.php'-->
              <span class='nav-link dropdown'>MATERIAIS</span>
            
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
        
        <!-- Breadcrumbs(menu de navegação)-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">materiais
          </li>
          <li class="col"></li>
          <li>
          <a class="btn btn-success" href="#" data-toggle="modal" data-target="#add_material">ADD</a></li>
        </ol>

        <!--area-->             
          <?php
          if($result_select_materiais){
            $cont=0;
            while($row = mysqli_fetch_array($result_select_materiais)) {
              if($cont==0) echo "<div class='row'>";
              echo "
              <div class='col-xl-3 col-sm-6 mb-3'>
              <div class='card text-white bg-primary h-100' style=''>
                <div class='card-body'>
                <h5 class='c ard-title'>Nome:</h5>
                <h6>".$row['username']."<h6>
                </div>
                <div class='card-footer btn-group'>
                <a class='text-white clearfix small z-1 btn' href='user_material.php?material=".$row['id']."'>Detalhes</a>
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
      <!-- /.container-fluid -->

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

<!-- add material -->
<div class="modal fade" id="add_material" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD Material</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formadd" name="formadd" method="POST" action="config/add.php?add=campo">
          <div class="form-group">
            <div class="form-group">
              <div class="form-label-group">
                <input type="text" id="addnome" name="addnome" class="form-control" placeholder="Nome" required="required">
                <label for="addnome">Nome</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="number" id="addvalor" name="addvalor" value="0.0" class="form-control" placeholder="valor" required="required">
                <label for="addvalor">Valor</label>
              </div>
            </div>
            <div class="form-group">
              <div class="form-label-group">
                <input type="mumber" id="addquant" name="addquant" value="1" min="1" class="form-control" placeholder="quantidade" required="required">
                <label for="addquant">Quantidae</label>
              </div>
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
</body>

</html>
    
</body>
</html>