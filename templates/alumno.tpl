{include file="header.tpl"}

<body>
    <div class="Container">
        <nav  id="menuContainer">
            {include file= "nav.tpl"}
        </nav>

        <section class= "datosAlumno">
            <section>
                {foreach from=$lista_Alumnos item=alumno}
                    <h1> {$alumno->nombre} {$alumno->apellido} id: {$alumno->id_alumno} </h1>
                    <p> Habilidad: {$alumno->habilidad}</p>
                    <p> Edad: {$alumno->edad}</p>
                    <p> Promedio: {$alumno->promedio}</p>
                    
                    {if isset($userLevel) && ($userLevel == 1)}
                        <p> Telefono: {$alumno->telefono}</p>
                        <p> Estado de carrera: {$alumno->carrera_terminada}</p>
                    {/if}
                {/foreach}
            </section>

            {if isset($imagenes)}
                <section class="imagenes">
                    {include file= "ver_imagenes.tpl"}
                </section>
            {/if}
        </section>

        <section>
            {if isset($userLevel) && ($userLevel == 1)}
                <form class="imagenes" method="POST" action="subirImagen/{$alumno->id_alumno}" enctype="multipart/form-data">
                    <h5>Sube una imagen:</h5>
                    <input type="file" name="input_name" id="ImagenASubir">
                    <button class="btn btn-primary" type="submit">Subir imagen</button>
                </form> 
            {/if}

            {if isset($userLevel) && ($userLevel == 1)}
                <h2> Actualizar </h2>
                <form action="actualizarAlumno" method="post">
                    <input type="text" name="nombre_u" placeholder="nombre" >
                    {*
                    <input type="text" name="apellido_u" placeholder="apellido">
                    <input type="number" name="telefono_u" placeholder="telefono">
                    <input type="text" name="habilidad_u" placeholder="habilidad">
                    <input type="number" name="edad_u" placeholder="edad">
                    <input type="text" name="promedio_u" placeholder="promedio">
                    <input type="number" name="id_curso_u" placeholder="id_curso">
                    <input type="number" name="carrera terminada_u" placeholder="carrera terminada">
                     *}
                    <input type="number" name="id_alumno_u" placeholder="id alumno" value="{$alumno->id_alumno}" class= "inexistente">
                    <input type="submit" value="Actualizar alumno">
                </form>
            {/if}
        </section>

        <section>
            {include file= "vue/comentariosList.tpl"}
        </section>


        <footer class="footerContainer">
            {include file="footer.tpl"}
        </footer>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="./js/comentarios.js"></script>

</body>
</html>