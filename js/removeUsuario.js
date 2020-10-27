function openRemoveModal(id) {
  idRemocao = id;
  $("#confirma_exclusao").modal();
}

var confirmaSenha = document.getElementById("remove-cpass")
var btnRemoveUsuario = document.getElementById("btn-remover-usuario")
var avisoSenha = document.getElementById("senhas-diferentes")


confirmaSenha.addEventListener("input", function(){
  let pass = document.getElementById("remove-pass").value;
  let cPass = document.getElementById("remove-cpass").value;  
  if(cPass == pass){            
    btnRemoveUsuario.title = ""  
    btnRemoveUsuario.disabled = false;
    avisoSenha.classList.add("d-none")
    }
    else{      
      btnRemoveUsuario.title = "Informe a senha antes de prosseguir"
      btnRemoveUsuario.disabled = true;
      avisoSenha.classList.remove("d-none")
    }  
   
})


function validaUserBeforeRemove() {
  let pass = document.getElementById("remove-pass").value;
  let cPass = document.getElementById("remove-cpass").value;
  if (pass !== cPass) {
    avisoSenha.classList.remove("d-none")
    btnRemoveUsuario.disabled = true;
  }
  let usuarioData = `pass_user=${pass}&id_remocao=${idRemocao}`;
  removeUsuarioConecta(usuarioData);  
}


function removeUsuarioConecta(usuarioData) {
  let xhr = new XMLHttpRequest();  
  xhr.open("POST", "controller/validaRemoveUsuario.php");
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send(usuarioData);
  xhr.addEventListener("load", function () {
    if (xhr.status == 200) {       
      xhr.responseText
      if(xhr.responseText == 1){        
        window.location.href = "controller/removeUsuario.php?id_remocao="+idRemocao;  
      }else{
        avisoSenha.classList.remove("d-none")
      }      
    } 
  });    
}
