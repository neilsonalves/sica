<!-- <?php

session_start();

if(($_SESSION['user_asseco'] == 'true')){
  header('location:index.php');
}
?> -->

<!DOCTYPE html>
<html lang="pt-BR">
  <head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>.:SICA:.</title>
  

  <!-- Custom fonts for this template-->
  <link href="css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="css/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">


  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/base.css" rel="stylesheet">

</head>
<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        
        <form id="formLogin" name="formLogin" method="POST" action="">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="email" class="form-control" placeholder="email" required="required" autofocus="autofocus" name="email">
              <label for="email">E-mail</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="senha" class="form-control" placeholder="Password" required="required" name="senha">
              <label for="senha">Senha</label>
            </div>
          </div>
          <!-- <div class="form-group">
            <div class="checkbox">
              <label>
                <input type="checkbox" value="remember-me">
                Remember Password
              </label>
            </div>
          </div> -->
          <!-- <a class="btn btn-primary btn-block" href="index.php">Login</a> -->
          <button class="btn btn-primary btn-block" type="submit">Login</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="404.php">Registrar-se</a>
          <a class="d-block small" href="404.php">Esqueceu a Senha?</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="js/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="js/jquery.easing.min.js"></script>

  <script src="js/index.js"></script>
  <script>
    $(function(){
      $('#formLogin').submit(function(){
        var dados;
        // dados = $(this).serialize();
        dados = new FormData(this);
        
        $.ajax({
          type: "POST",
          url: "config/processa.php",
          data: dados,
          processData: false,
          cache: false,
          contentType: false,
          success: function( data ){
            if(data.indexOf('login_ok') >= 0){
              window.location.href = 'index.php';
            }else if(data.indexOf('login_error') >= 0){
              //alert("erro:"+data);
            }else{}
          }
        });
      return false;
		});
	});
  </script>
</body>

</html>
