{include file="header.tpl"}

<body>
    <div class="Container">
        <nav  id="menuContainer">
            {include file="nav.tpl"}
        </nav>

        <section>
            {foreach from=$info_curso item=curso}
                <h1> {$curso->nombre} ID: {$curso->id_curso} Año correspondiente: {$curso->agno_correspondiente} </h1>
                <p> Profesor: {$curso->profesor} </p>
                <p> Descripcion: {$curso->descripcion} </p>
            {/foreach}
        </section>
        <section>
            <h2> Alumnos inscriptos </h2>
            {foreach from=$lista_AlumnosCurso item=curso}
                <li> <a href='alumno/{$curso->alumno_id}'> {$curso->alumno_nombre}, {$curso->alumno_apellido} </a></li> 
            {/foreach}
        </section>

        {if isset($userLevel) && ($userLevel == 1)}
            <form action="actualizarCurso" method="post">
                <select name="seccion_u"  placeholder="columna a modificar">
                    <option value="nombre">nombre</option> 
                    <option value="descripcion" selected>descripcion</option>
                    <option value="agno_correspondiente">año</option>
                    <option value="profesor">profesor</option>
                </select>
                <input type="text" name="dato_u" placeholder="nuevo valor" id="nombre">
                <input type="number" name="id_curso_u" placeholder="id curso" value="{$curso->id_curso}" class= "inexistente">
                <input type="submit" value="Actualizar curso">
            </form>
        {/if}
    
        <footer class="footerContainer">
            {include file="footer.tpl"}
        </footer>
    </div>
</body>
</html>