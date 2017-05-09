function fCadastro(){
    senha = document.getElementById("iSenha").value;
    confirmaSenha = document.getElementById("iConfirmaSenha").value;
    nome = document.getElementById("iNome").value;
    telefone = document.getElementById("iTelefone").value;
    uf = document.getElementById("iUf").value;

    masculino = document.getElementById("masculino").checked;
    feminino = document.getElementById("feminino").checked;

    if (masculino){
      sexo = "Masculino";
    } else {
      sexo = "Feminino";
    }

    if ( (senha.search(" ") != -1) || (confirmaSenha.search(" ") != -1 ) ){
      alert('A senha não pode conter espaços em branco!');
    } else if (senha != confirmaSenha){
      alert('A senha e confirmação de senha são diferentes!');
    } else {
      alert('Cadastro com sucesso!' +
      '\nNome: ' + nome +
      '\nTelefone: ' + telefone +
      '\nEstado: ' + uf +
      '\nSexo: ' + sexo
      );
    }

    return false;
}
