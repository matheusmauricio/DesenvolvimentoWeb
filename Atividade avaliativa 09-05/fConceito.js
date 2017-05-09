function fConceito(){
    nota = document.getElementById("iNotaAluno").value;


    if (nota < 3){
      conceito = "Conceito E";
    } else if (nota >= 3 && nota < 6){
      conceito = "Conceito D";
    } else if (nota >= 6 && nota < 8){
      conceito = "Conceito C";
    } else if (nota >= 8 && nota < 9){
      conceito = "Conceito B";
    } else if (nota >= 9 && nota <= 10){
      conceito = "Conceito A";
    } else {
      conceito = "Digite uma nota válida (de 0 a 10)";
    }

    document.getElementById("iConceito").value = conceito;


    return false;
}
