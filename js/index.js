var formEditer = `
<div id='userEditer' style='display: none;'>
<!-- <form id='registro' name='registro' method='POST' action=''> -->
<form id='registro' name='registro' method='POST' action=''>
          <div class='form-group'>
                <div class='form-label-group'>
                  <input type='text' id='user_name' name='user_name' class='form-control' placeholder='First name' required='required' autofocus='autofocus' value='$usuario_nome'>
                  <label for='user_name'>Nome</label>
                </div>
          </div>
          <div class='form-group'>
            <div class='form-label-group'>
              <input type='email' id='user_email' name='user_email' class='form-control' placeholder='Email address' required='required' value='$usuario_email'>
              <label for='user_email'>Endereço E-mail</label>
            </div>
          </div>
          <div class='form-group'>
            <div class='form-row'>
              <div class='col-md-6'>
                <div class='form-label-group'>
                  <input type='password' id='user_senha' name='user_senha' class='form-control' placeholder='Password' required='required' value='$usuario_senha'>
                  <label for='inputPassword'>Senha</label>
                </div>
              </div>
              <div class='col-md-6'>
                <div class='form-label-group'>
                  <input type='password' id='user_senha_camfime' name='user_senha_camfime' class='form-control' placeholder='Confirm password' required='required' value='$usuario_senha'>
                  <label for='user_senha_camfime' >Confirme a Senha</label>
                </div>
              </div>
            </div>
          </div>
          <div class='form-row'>
          <button class='btn btn-primary btn-bloc k col-md-3 m-1' onclick='visualizar()' >CAMCELAR</button>
          <button class='btn btn-primary btn-bloc k col-md-3 m-1' type='submit' >ATUALIZAR</button>
          </div>
        </form>
</div>`;
var stado=true;
function visualizar(){
    // userEditer, user
    var viu = document.getElementById("userEditer");
    var esconde = document.getElementById("user");
    if(stado){
        viu.style.display = "inline";
        esconde.style.display = "none";
        stado=false;
    }else{
        viu.style.display = "none";
        esconde.style.display = "inline";
        // viu.innerHTML = "";
        stado=true;
    }
}

function test(start, stop){
    // alert("start="+start+"stop="+stop);
    document.getElementById(start).style.display = "inline";
    document.getElementById(stop).style.display = "none";
}