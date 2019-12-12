let app= new Vue({
    el: "#template_vue_comentarios",
    data: {
        subtitle: "comentarios huehuehue",
        comentarios: [],
        mod: false,
        comentario: null,
        estrellas: null,
        id_alumno: null,
        comentarioMod: null,
        estrellasMod: null,
        id_alumnoMod: null,
        admin: true,
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

function porcionCodigo(int){
    let ubicacion = location.pathname;
    console.log(ubicacion);
    let porciones = ubicacion.split('/');
    let id_alumno = porciones[int];
    console.log(id_alumno);
    return id_alumno
}

async function getComentarios(){
    let id_alumno = porcionCodigo(3);
    let contenido = await fetch('api/comentarios/' + id_alumno,
        {
        "method": "GET",
        "headers": { "Content-Type": "application/json" },
        });
    
    let comentarios = await contenido.json(); //error si no paso nada
    console.log(comentarios);
    app.comentarios = comentarios;
 } 

async function addComentario(){
    let alumno_id = porcionCodigo(3);
    let data = {
        comentario : document.querySelector("input[name = comentario]").value,
        estrellas : document.querySelector("input[name = estrellas]").value,
        id_alumno : parseInt(alumno_id),
    }
    console.log(data);
    try {
        let response = await fetch('api/comentarios/', 
            {
            method : "POST",
            headers : {"Content-Type": "application/json"}, 
            body : JSON.stringify(data)
            });
         
        let respuesta = await response.json();
        if (respuesta){ 
            getComentarios(); 
            return respuesta;}
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
    if (respuesta){ 
        getComentarios(); 
        return respuesta;}
    else {console.log(error);}
 } 

getComentarios();
let agrega = document.querySelector("#form_comentarios")
if(agrega){ agrega.addEventListener('Submit',addComentario);}
let elimina = document.querySelector("#btn_eliminar")
if(elimina){ elimina.addEventListener('click',deleteComentario);}