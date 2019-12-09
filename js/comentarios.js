let app= new Vue({
    el: "#template_vue_comentarios",
    data: {
        subtitle: "comentarios huehuehue",
        comentarios: [],
        auth: true,
        mod: false,
        comentario: null,
        estrellas: null,
        id_alumno: null,
        comentarioMod: null,
        estrellasMod: null,
        id_alumnoMod: null
    },
    methods: {
        checkForm: function(e){
            e.preventDefault();
            addComentario();
        },
        deleteFunction: function(e){
            deleteComentario(e);
    }   }
});

async function getComentarios(){
    app.auth = true; //activar carga

    let ubicacion = location.pathname;
    console.log(ubicacion);
    let porciones = ubicacion.split('/');
    let id_alumno = porciones[3];
    console.log(id_alumno);

    let contenido = await fetch('api/comentarios/' + id_alumno,
        {
        "method": "GET",
        "headers": { "Content-Type": "application/json" },
        });
    
    let comentarios = await contenido.json(); //error si no paso nada
    console.log(comentarios);
    app.comentarios = comentarios;
    app.auth = false;
 } 

async function addComentario(){
    try {
        let data = {
            comentario : document.querySelector("input[name = comentario]").value,
            estrellas : document.querySelector("input[name = estrellas]").value,
            id_alumno : document.querySelector("input[name = id_alumno]").value,
        }
        console.log(data);
        let response = await fetch('api/comentarios/', 
            {
            method : "POST",
            headers : {"Content-Type": "application/json"}, 
            body : JSON.stringify(data)
            });
         
        let respuesta = await response.json();
        if (respuesta){ return respuesta;}
    }catch (error) {
        console.log(error);
}   }

async function deleteComentario(id_comentario){

    let contenido = await fetch('api/comentarios/' + id_comentario,
        {
        "method": "DELETE",
        "headers": { "Content-Type": "application/json" },
        });
    
        let respuesta = await contenido.json();
        if (respuesta){ return respuesta;}
        else {console.log(error);}
 } 

getComentarios(); //hacer que actualice cada vez que haya una modificacion en la pagina
let agrega = document.querySelector("#form_comentarios")
if(agrega){ agrega.addEventListener('Submit',addComentario);}
let elimina = document.querySelector("#btn_eliminar")
if(elimina){ elimina.addEventListener('click',deleteComentario);}