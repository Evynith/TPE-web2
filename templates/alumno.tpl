{include file="header.tpl"}

<body>
    <div class="Container">
        <nav  id="menuContainer">
            {include file= "nav.tpl"}
        </nav>

            {if isset($mensaje)}
                <div class= "alert">
                    {{$mensaje}}
                </div>
            {/if}

        <section class= "datosAlumno">
            <section class= "alumno">
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

            {if isset($lista_imagenes)}
                    {include file= "ver_imagenes.tpl"}
            {/if}

        </section>

        <section>
            {if isset($userLevel) && ($userLevel == 1)}
                <form class="imagenes" method="POST" action="subirImagen/{$alumno->id_alumno}" enctype="multipart/form-data">
                    <h5>Sube una imagen:</h5>
                    <input type="file" name="input_name" id="ImagenASubir">
                    <button type="submit">Subir imagen</button>
                </form> 
            {/if}

            {if isset($userLevel) && ($userLevel == 1)}
                <h2> Actualizar </h2>
                    <form action="actualizarAlumno" method="post">
                    <select name="seccion_u"  placeholder="columna a modificar">
                        <option value="nombre">nombre</option> 
                        <option value="apellido" selected>apellido</option>
                        <option value="telefono">telefono</option>
                        <option value="habilidad">habilidad</option>
                        <option value="promedio">promedio</option>
                        <option value="edad">edad</option>
                        <option value="carrera_terminada">carrera terminada</option>
                    </select>
                    <input type="text" name="valor_u" placeholder="nuevo dato" >
                    <input type="number" name="id_alumno_u" placeholder="id alumno" value="{$alumno->id_alumno}" class= "inexistente">
                    <input type="submit" value="Actualizar alumno">
                </form>
            {/if}
        </section>

        <section class= "comentarios">
            <h2> Comentarios </h2>
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