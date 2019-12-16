{literal}
    <section id= "template_vue_comentarios">
    <h3>{{subtitle}}</h3>
    
     <ul>
       <li v-for="coment in comentarios">
           <div v-if="coment.comentario != null">
              <span v-if=> {{ coment.comentario }}  {{coment.estrellas}}   {{coment.id_alumno}}  </span> 
              <div v-if= "admin == true"> <a v-on:click="deleteFunction(coment.id_comentario)" id="btn_eliminar" class ="BtnA" >eliminar</a> </div>
           </div>
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
   <input
    type="submit"
    value="Enviar"
  >
</form>

</section>

{/literal}