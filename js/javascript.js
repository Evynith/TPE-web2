"use strict";

//---------------------------------------------carrusel--------------------------------------------------------//
function carousel(){
  let i = 0;

  function pasar (e) {
      if (e == true){
          i--;
      }
      else if (e == false){
          i++;
      }
      let imagenes = ["../academia/images/uno.jpeg","../academia/images/dos.jpeg","../academia/images/tres.jpeg"];
      if (i < 0){
          i = (imagenes.length - 1); //porque imagenes length es 3 y hay de 0 a 2 imagenes
      }
      else if (i >= imagenes.length){
          i = 0;
      }
      document.getElementById("imagen").src = imagenes[i];
  }
      
  let miSetOut = setInterval( function(){pasar(true);} ,2000 );
  
  let atras = document.getElementById("atras");
  atras.addEventListener("click",function () {pasar(true)});
  let siguiente = document.getElementById("siguiente");
  siguiente.addEventListener("click",function () {pasar(false)});
  
}
carousel();
//------------------------------------------------------------------------------------------------------------//
//---------------------------------------------JUEGO----------------------------------------------------------//

