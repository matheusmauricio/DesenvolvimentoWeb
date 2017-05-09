function fAumentarSalario(){
    nome = document.getElementById("iNomeFuncionario").value;
    salario = document.getElementById("iSalarioFuncionario").value;



    if (salario >= 0 && salario < 722.00){
      novoSalario = eval(salario) + eval(salario * 0.1);
      novoSalario = novoSalario.toFixed(2);
      resultado = nome + ", 10% de aumento. Salário atual = " + salario + " novo salário= " + novoSalario + ".";
    } else if (salario >= 722.01 && salario < 900.00){
      novoSalario = eval(salario) + eval(salario * 0.06);
      novoSalario = novoSalario.toFixed(2);
      resultado = nome + ", 6% de aumento. Salário atual = " + salario + " novo salário= " + novoSalario + ".";
    } else if (salario >= 900.01 && salario < 1200.00){
      novoSalario = eval(salario) + eval(salario * 0.04);
      resultado = nome + ", 4% de aumento. Salário atual = " + salario + " novo salário= " + novoSalario + ".";
    } else if (salario >= 1200.01 && salario < 1500.00){
      novoSalario = eval(salario) + eval(salario * 0.02);
      resultado = nome + ", 2% de aumento. Salário atual = " + salario + " novo salário= " + novoSalario + ".";
    } else if (salario >= 1500.00){
      novoSalario = salario;
      resultado = nome + ", sem aumento salarial. Salário atual = " + salario + ".";
    } else {
      resultado = "Digite um salário válido!";
    }

    document.getElementById("iResultado").value = resultado;


    return false;
}
