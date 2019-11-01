"use strict";

/*
document.addEventListener('DOMContentLoaded', iniciarPagina);
function iniciarPagina() {
*/

//window.onload = function () { //(para usar solo cuando imagenes y demas cosas pesadas ya cargaron)
   
$(document).ready(function(){ //deprecated (para usar solo con elemento del DOM)

//$(function() { //supuesto metodo actual
     
    function meterNavYFoot(){
        /*
        let link = document.createElement("object");
        link.setAttribute( "data", "academia/menu.html");
        link.setAttribute( "type", "text/html");
        link.classList.add("navegador");
        document.body.nav.appendChild(link);   */

        $(document).ready(function () {
            $('.menuContainer').load('academia/menu.html');
          });

        $(document).ready(function () {
          $('.footerContainer').load('academia/footer.html');
        });
    }

    meterNavYFoot();

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
//-----------------------------------------nav----------------------------------------------------------------//
/*
let nav = document.getElementById('me'),
body = document.body;

nav.addEventListener('mouseover', function(e) {
  body.className = body.className? '' : 'invisible';
  e.preventDefault();
});
*/

/*
function invisibilidad(){
  let nav = document.getElementsById("me");
  nav.classList.toggle("invisible");
}

let nav = document.getElementsByTagName("nav");
nav.addEventListener("mouseover",invisibilidad);
*/
/*
$("me").hover(function() { $(this).removeClass("invisible"); }, function() { $(this).addClass("invisible"); });
*/
/*
cambia = document.getElementById("prueba");
cambia.addEventListener("mouseover", function(){document.getElementById("prueba").classList.add("invisible");});
*/
/*
  cambia = document.getElementById("prueba");
  cambia.onmouseover = function(){document.getElementById("prueba").classList.toggle("invisible");};
*/

//------------------------------------------------------------------------------------------------------------//
//}
});
//}); lo del header y footer ahora se hacer con smarty
