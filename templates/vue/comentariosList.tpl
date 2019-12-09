{literal}
    <section id= "template_vue_comentarios">
    <h3>{{subtitle}}</h3>
    
     <ul>
       <li v-for="coment in comentarios">
            <span> {{ coment.comentario }}  {{coment.estrellas}}   {{coment.id_alumno}}  </span> 
              <button v-on:click="deleteFunction(coment.id_comentario)" id="btn_eliminar">eliminar</button>
       </li> 
    </ul>

<form id= "form_comentarios" 
  @submit="checkForm"
  >
  
    <label for="comentario">comentario</label>
    <input
      id="comentario"
      v-model="comentario"
      type="text"
      name="comentario"
    >
    <label for="estrellas">estrellas</label>
    <input
      id="estrellas"
      v-model="estrellas"
      type="number"
      name="estrellas"
      min= "1"
      max= "5"
    >
    <label for="id_alumno">id_alumno</label>
    <input
      id="id_alumno"
      v-model="id_alumno"
      type="number"
      name="id_alumno"
      min= "1"
    >
     <input
      type="submit"
      value="Enviar"
    >
</form>

</section>

{/literal}