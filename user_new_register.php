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
  

  $sql_select_usuarios="select * from usuarios where id !=".$_SESSION['user_id'];
  $result_select_usuarios = mysqli_query($conexao,$sql_select_usuarios);

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
          <li class='nav-item dropdown active'>
            <!--a class='nav-link dropdown' href='user_usuarios.php'-->
              <span class='nav-link dropdown'>USUARIOS</span>
            
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
        
        <!-- Breadcrumbs(menu de navegação)-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
          <a href="user_usuarios.php" class="text-">Usuarios</a>
          </li>
          <li class="breadcrumb-item active">novo usuario</li>
          <li class="col"></li>
        
        </ol>

        <!--area-->             
      
      <div class="container">
    <div class="card card-register mx-auto mt-5">
      <!-- <div class="card-header">Registre uma conta</div> -->
      <div class="card-body">
        <form  id="registro" name="registro" method="POST" action="">
          <div class="form-group">
                <div class="form-label-group">
                  <input type="text" id="user_name" name="user_name" class="form-control" placeholder="First name" required="required" autofocus="autofocus">
                  <label for="user_name">Nome</label>
                </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="user_email" name="user_email" class="form-control" placeholder="Email address" required="required">
              <label for="user_email">Endereço E-mail</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="user_senha" name="user_senha" class="form-control" placeholder="Password" required="required">
                  <label for="inputPassword">Senha</label>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="user_senha_camfime" name="user_senha_camfime" class="form-control" placeholder="Confirm password" required="required">
                  <label for="user_senha_camfime" >Confirme a Senha</label>
                </div>
              </div>
            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit">Registra</button>
        </form>
      </div>
    </div>
  </div>
      
      </div>
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
    var c=0;
    $(function(){
      $('#registro').submit(function(){
        var dados;
        dados = new FormData(this);
        
        $.ajax({
          type: "POST",
          url: "config/user_processo.php?tipo=add_user",
          data: dados,
          processData: false,
          cache: false,
          contentType: false,
          success: function( data ){
            if(data.indexOf('userAdd')>=0){
              window.location.href = 'user_usuarios.php';
              // alert(data);
            }else if(data.indexOf('senhaError')){
              alert(data);
            }else{
              alert(data);
            }
          }
        });
      return false;
    });
    
  function check(){
    if(c==0){
      c=1;
    }else{
      c=0;
    }
    alert('c');
  }
  });
  </script>
</body>

</html>
    
</body>
</html>