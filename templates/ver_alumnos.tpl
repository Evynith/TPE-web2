{include file="header.tpl"}
    
<body>
     <nav  id="menuContainer">
        {include file="nav.tpl"}
    </nav>

    <div class="Container">

        {foreach from=$lista_Alumnos item=alumno}

            <li>{$alumno->nombre}: {$alumno->apellido} : {$alumno->id_alumno}- {if isset($userLevel) && ($userLevel == 1)} <a href='borrar/{$alumno->id_alumno}'>Borrar</a> {/if} </li> 

        {/foreach}


        {if isset($userLevel) && ($userLevel == 1)}
                
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
            {*    <input type="text" name="apellido_u" placeholder="apellido">
                <input type="number" name="telefono_u" placeholder="telefono">
                <input type="text" name="habilidad_u" placeholder="habilidad">
                <input type="number" name="edad_u" placeholder="edad">
                <input type="text" name="promedio_u" placeholder="promedio">
                <input type="number" name="id_curso_u" placeholder="id_curso">
                <input type="number" name="carrera terminada_u" placeholder="carrera terminada"> *}
                <input type="number" name="id_alumno_u" placeholder="id alumno">
                <input type="submit" value="actualizar" href= "actualizarcurso">
                <a href='actualizar'>actualizar</a>
            </form>
        {/if}
    </div>
        <footer class="footerContainer">
            {include file="footer.tpl"}
        </footer>

</body>
</html>