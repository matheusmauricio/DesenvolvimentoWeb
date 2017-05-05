function fCalcular(){
  
  num1 = document.getElementById("inum1").value;
  num2 = document.getElementById("inum2").value;
  oper1 = document.getElementById("adicao").checked;
  oper2 = document.getElementById("subtracao").checked;
  oper3 = document.getElementById("multiplicacao").checked;
  oper4 = document.getElementById("divisao").checked;

  if (oper1){
    result = eval(num1) + eval(num2);
  }else if (oper2){
    result = num1 - num2;
  } else if(oper3){
    result = num1 * num2;
  } else {
    result = num1 / num2;
  }


  document.getElementById("iResultado").value = result;

  return false;
}
