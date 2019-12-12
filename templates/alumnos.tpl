{include file="header.tpl"}
    
<body>
    <div class="Container">
        <nav  id="menuContainer">
            {include file="nav.tpl"}
        </nav>

        <section>
            {foreach from=$lista_Alumnos item=alumno}
                <li><a href='alumno/{$alumno->id_alumno}'> {$alumno->nombre}, {$alumno->apellido} </a> {if isset($userLevel) && ($userLevel == 1)} <a href='borrar/{$alumno->id_alumno}'>Borrar</a> {/if} </li> 
            {/foreach}
        </section>
        <section>
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
            {/if}
        </section>

        <footer class="footerContainer">
            {include file="footer.tpl"}
        </footer>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
<script src="./js/comentarios.js"></script>

</body>
</html>