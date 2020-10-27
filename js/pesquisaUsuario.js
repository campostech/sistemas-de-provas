var botaoPesquisarUsuario = document.getElementById("btn-pesquisa-usuario");

botaoPesquisarUsuario.addEventListener("click", function () {
  let valorPesquisa = document.getElementById("input-pesquisa-usuario").value;
  let usuarios = document.querySelectorAll(".usuario-tabela");

  if (valorPesquisa.length > 0) {
    for (i = 0; i < usuarios.length; i++) {
      let usuario = usuarios[i];
      let nome = usuario.querySelector(".info-nome").textContent;
      let searchValue = new RegExp(valorPesquisa, "i");

      if (!searchValue.test(nome)) {
        usuario.classList.add("d-none");
      } else {
        usuario.classList.remove("d-none");
      }
    }
  } else {
    for (let i = 0; i < usuarios.length; i++) {
      let usuario = usuarios[i];
      usuario.classList.remove("d-none");
    }
  }
});


var botaoLimpaPesquisa = document.getElementById("btn-limpa-busca");
botaoLimpaPesquisa.addEventListener("click", function () {
  document.getElementById("input-pesquisa-usuario").value = ""
  let valorPesquisa = document.getElementById("input-pesquisa-usuario").value;
  let usuarios = document.querySelectorAll(".usuario-tabela");
  valorPesquisa = "" 
  for (let i = 0; i < usuarios.length; i++) {
      let usuario = usuarios[i];
      usuario.classList.remove("d-none");
    }

});

