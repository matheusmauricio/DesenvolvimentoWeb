function fIMC(){
    peso = document.getElementById("iPeso").value;
    altura = document.getElementById("iAltura").value;

    imc = (peso) / Math.pow(altura,2);

    imc = imc.toFixed(1);

    if (imc < 18.5){
      tipoIMC = "Você está abaixo do peso ideal";
    } else if (imc >= 18.5 && imc < 25){
      tipoIMC = "Parabéns!! Você está em seu peso normal!";
    } else if (imc >= 25 && imc < 30){
      tipoIMC = "Você está acima de seu peso (sobrepeso)";
    } else if (imc >= 30 && imc < 35){
      tipoIMC = "Obesidade grau I";
    } else if (imc >= 35 && imc < 40){
      tipoIMC = "Obesidade grau II";
    } else {
      tipoIMC = "Obesidade grau III";
    }

    document.getElementById("iIMC").value = imc;
    document.getElementById("iTipoIMC").value = tipoIMC;
    
    return false;
}
