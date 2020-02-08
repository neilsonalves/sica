<!--<?php
  include("config/conexao.php");
  session_start();

  if($_SESSION['user_asseco'] != 'true'){
    header('location:login.php');
  }else if($_SESSION['root'] == "0"){
    header('location:index.php');
  }

  $id_usuario = $_GET['user'];

  $sql_select_usuario="SELECT * FROM usuarios WHERE id=$id_usuario";
  $sql_select_campo="SELECT * FROM campos WHERE id_user=$id_usuario";

  $result_usuario = mysqli_query($conexao,$sql_select_usuario);
  $result_campo = mysqli_query($conexao,$sql_select_campo);

  while($row = mysqli_fetch_array($result_usuario)) {
    $usuario_nome = $row['nome'];
    $usuario_email = $row['email'];
    $usuario_senha = $row['senha'];
    $root = $row['root'];
    $atividade = $row['atividade'];
  };
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
        <?php echo "<span class='nav-link active'>Bem vindo,  ".$_SESSION['user']."</span>";?>
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
          <li class='nav-item dropdown'>
            <a class='nav-link dropdown' href='user_materiais.php'>
              <span class=''>MATERIAIS</span>
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
          <li class="breadcrumb-item "><a href="user_usuarios.php" class="text-secondary">Usuarios</a>
          </li>
          <li class="breadcrumb-item active">
          <?php
            if($result_usuario) echo "$usuario_nome";
            else{
              echo "<h5>Descupas tivemos um error com banco de dados ou com a pagina, avisa-nos <a href='#'>click aqui</a></h5>";
            }
            ?>
            </li>
          <li class="col"></li>
          <li >
            <a class="nav-link dropdown-toggle text-dark alert-dark" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user-edit fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
              <button class="dropdown-item"onclick='visualizar()' >Editar</button>
              <!-- <a class="dropdown-item" href="#">Editar</a> -->
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_user">Deletar</a>
            </div>
          </li>
        </ol>
        
        <?php
        echo "
        <div id='user' style='display: inline;'>
        <p>Nome: $usuario_nome</p>
        <p>E-mail: $usuario_email</p>
        <p><div id='userSenha' style='display: inline;'>Senha: <div onclick='test(\"formComfime\", \"userSenha\")' class='btn btn-success'>resete</div></div></p>
        <form id='formComfime' style='display: none;' name='formComfime' method='POST' action='config/user_update.php?tipo=userUpdateSenha&id=$id_usuario'>
          <div class='form-group'>
            <div class='col-3' style='padding:0px;'>
              <div class='form-label-group'>
                <input type='password' id='camfimeSenha' name='camfimeSenha' class='form-control' placeholder='Confirm password' required='required'>
                <label for='camfimeSenha' >Confirme a senha do admin</label>
              </div>
            </div
          </div>
        <div class='btn btn-primary btn-bloc k c ol-md-3 m1' onclick='test(\"userSenha\",\"formComfime\")' >CAMCELAR</div>
        <button class='btn btn-primary btn-bloc k c ol-md-3 m1' type='submit' >comfime</button>
        </div>
                </form>";

        // if($usuario_stado){
          if($atividade){
            echo "<p>Ativo: <a  href='config/user_update.php?tipo=user_ativo&ativo=0&id=$id_usuario' class='btn btn-success'>Sim</a></p>";
          }else{
            echo "<p>Ativo: <a  href='config/user_update.php?tipo=user_ativo&ativo=1&id=$id_usuario' class='btn btn-danger'>Não</a></p>";
          }
          if($root){
            echo "<p>Root: <a  href='config/user_update.php?tipo=user_root&root=0&id=$id_usuario' class='btn btn-success'>Sim</a></p>";
          }else{
            echo "<p>Root: <a  href='config/user_update.php?tipo=user_root&root=1&id=$id_usuario' class='btn btn-danger'>Não</a></p>";
          }

        ?>

        <!-- <div class="row"> -->
          <!-- <div class="col-lg-8"> -->
          <!-- <div class="card mb-3"> -->
              <!-- <div class="card-header">Sensores</div> -->
              <!-- <div class="card-body "> -->
              <?php
                // if($result_campo){
                // //   if(array_count_values(mysqli_fetch_array($result_sensores))==0) echo "Não tem sensor!";
                // $cont=0;
                // while($row = mysqli_fetch_array($result_campo)) {
                //   if($cont==0){
                //     echo "<div class='row'>";
                //   }
                //   echo "
                //     <div class='card text-white bg-danger o-hidden h-100' style='margin: 5px;'>
                //       <div class='card-body'>
                //         <div class='card-body-icon'>
                //         </div>
                //         <div class='mr-5'>Campo: ".$row['nome']."</div>
                //       </div>
                //       <div class='card-footer'>
                //         <!--a class='text-white clearfix small z-1' href=''>
                //           <span class='float-left'>Detalhes</span>
                //         </a-->
                //       </div>
                //     </div>";
                //     if($cont==4){
                //       echo "</div><!-- fim div.row -->";
                //       $cont=0;
                //     }else{
                //       $cont++;
                //     }
                //   }
                //   if(($cont<=4)&&($cont!=0)){
                //     echo "</div><!-- fim div.row -->";
                //   }else echo "sem campo para visualizar!";
                // }else{
                //   echo "<h5>Descupas tivemos um error com banco de dados ou com a pagina, avisa-nos <a href='#'>click aqui</a></h5>";
                // }
                    ?>
            <!-- </div> -->
            <!-- </div> -->
          <!-- </div> -->
          <!-- <div class="col-lg-4"> -->
            <!-- <div class="card mb-3"> -->
              <!-- <div class="card-header"> -->
              <!-- <span><div class="btn btn-success" onclick="#">add</div></span> -->
              <!-- <span class="col">Botoes</span> -->
              <!-- </div> -->
              <!-- <div class="card-body"> -->
                  <?php
                    // echo "<p>não tem botoes para visualizar</a>";
                  ?>
              <!-- </div> -->
            <!-- </div> -->
          <!-- </div> -->
        <!-- </div> -->
        <?php
        echo "</div>";
        echo "<div id='userEditer' style='display: none;'>";
        echo "<form id='registro' name='registro' method='POST' action='config/update.php?tipo=user&id=$id_usuario'>
        <!--form-->
                  <div class='form-group'>
                        <div class='form-label-group'>
                          <input type='text' id='nome' name='nome' class='form-control' placeholder='First name' required='required' autofocus='autofocus' value='$usuario_nome'>
                          <label for='nome'>Nome</label>
                        </div>
                  </div>
                  <div class='form-group'>
                    <div class='form-label-group'>
                      <input type='email' id='email' name='email' class='form-control' placeholder='Email address' required='required' value='$usuario_email'>
                      <label for='email'>Endereço E-mail</label>
                    </div>
                  </div>
                  <div class='form-row'>
                  <div class='btn btn-secondary col-md-3 m-1' onclick='visualizar()' >CAMCELAR</div>
                  <button class='btn btn-warning col-md-3 m-1' type='submit' >ATUALIZAR</button>
                  </div>
                </form>";
        echo "</div>";
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

<!-- add -->
<div class="modal fade" id="delete_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Aviso!</h5>
      <button class="close" type="button" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
      </button>
    </div>
    <div class="modal-body">
      <p>Tem certeza de que deseja deletar o usuario, tendo em mente que todo os dados e historico do mesno seram apagado pemanetimente?</p>
            <div class="btn btn-secondary" type="button" data-dismiss="modal">NÃO</div>
            <?php echo "<a href='config/user_delete.php?tipo=user&id=$id_usuario' class='btn btn-danger' type='submit'>DELETAR</a>";?>
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
<?php

mysqli_close($conexao);
?>