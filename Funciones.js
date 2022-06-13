var lis = document.querySelectorAll(".valor-desplegable [data-val]");
// cada vez que se pulse en una opción del menú desplegable
for (var x = 0; x < lis.length; x++) {
  lis[x].addEventListener("click", function() {
    // actualizar el texto y el valor
    document.getElementById("miValorVisible").textContent = this.textContent;
    document.getElementById("miValor").value = this.dataset.val;
  });
}

var lis2 = document.querySelectorAll(".valor-desplegable [data-val2]");

for (var x = 0; x < lis2.length; x++) {
  lis2[x].addEventListener("click", function() {
    // actualizar el texto y el valor
    document.getElementById("miValorVisible2").textContent = this.textContent;
    document.getElementById("miValor2").value = this.dataset.val;
  });
}


var input = document.getElementById("valorDesplegable1").style.display = none;
var input2 = document.getElementById("valorDesplegable1");

function carg(elemento) {
  d = elemento.value;  
  if(d == "1"){
    document.getElementById("valorDesplegable1").style.display = none;
  }else if(d == "2"){
    document.getElementById("valorDesplegable2").style.display = none;
  }else{
    input.disabled = false;
    input2.disabled = false;
  }

}function mostrar(id){

switch(id.value){
    case "1":
             document.getElementById("valorDesplegable1").style.display = 'none';
             document.getElementById("valorDesplegable2").style.display = 'inline-flex';
    break;
    case "2":
             document.getElementById("valorDesplegable2").style.display = 'none';
             document.getElementById("valorDesplegable1").style.display = 'inline-flex';
    break;
    default:
             document.getElementById("valorDesplegable1").style.display = 'none';
             document.getElementById("valorDesplegable2").style.display = 'none';
    break;
}
}



// mostrar el valor cuando se pulse en Enviar (en vez de enviar)
//document.getElementById("enviar").addEventListener("click", function(e) {
 // e.preventDefault();
 // console.log("El valor del select es: " + document.getElementById("miValor").value);
//});