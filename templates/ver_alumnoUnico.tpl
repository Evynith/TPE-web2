{include file="header.tpl"}
    
<body>
     <nav  id="menuContainer">
        {include file= "nav.tpl"}
    </nav>

    <div class="Container">

        {foreach from=$lista_Alumnos item=alumno}

            <li>{$alumno->nombre}: {$alumno->apellido} : {$alumno->id_alumno}- <a href='borrar/{$alumno->id_alumno}'>Borrar</a></li> 

        {/foreach}

        <form action="insertar" method="post">
            <input type="text" name="nombre" placeholder="nombre">
            <input type="text" name="apellido" placeholder="apellido">
            <input type="number" name="telefono" placeholder="telefono">
            <input type="text" name="habilidad" placeholder="habilidad">
            <input type="number" name="edad" placeholder="edad">
            <input type="text" name="promedio" placeholder="promedio">
            <input type="number" name="id_curso" placeholder="id_curso">
            <input type="number" name="carrera terminada" placeholder="carrera terminada">
            <input type="submit" value="Insertar" href= "insertar">
            <a href='insertar'>insertar</a>
        </form>

        <h2> Actualizar </h2>
        <form action="actualizar" method="post">
            <input type="text" name="nombre_u" placeholder="nombre" >

            <input type="number" name="id_alumno_u" placeholder="id alumno">
            <input type="submit" value="actualizar" href= "actualizarcurso">
            <a href='actualizar'>actualizar</a>
        </form>

        {include file= "comentarios.tpl"}

         {if $alumno->imagen && $alumno->imagen != ''}
                <img src="{$alumno->imagen}"/>
            {/if}
        <form class="imagenes" method="POST" action="subirImagen/{$alumno->id_alumno}" enctype="multipart/form-data">
                    <h5>Sube una imagen:</h5>
                    <input type="file" name="input_name" id="ImagenASubir">
                    <button class="btn btn-primary" type="submit">Subir imagen</button>
                </form> 
        <footer class="footerContainer">
            {include file="footer.tpl"}
        </footer>
        
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="./js/comentarios.js"></script>

</body>
</html>