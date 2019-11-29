
{include file="header.tpl"}
    <body>
     <nav  id="menuContainer">
        {include file="nav.tpl"}
    </nav>

    <div class="Container">

            {foreach from=$lista_Cursos item=curso}

                <li>{$curso->nombre}: {$curso->profesor} : {$curso->id_curso}- {if isset($userLevel) && ($userLevel == 1)}<a href='borrarcurso/{$curso->id_curso}'>Borrar</a>{/if} </li>

            {/foreach}

            {if isset($userLevel) && ($userLevel == 1)}

                <form action="insertarcurso" method="post">
                    <input type="text" name="nombre" placeholder="nombre" id="nombre">
                    <input type="text" name="profesor" placeholder="profesor">
                    <input type="number" name="agno_correspondiente" placeholder="agno_correspondiente">
                    <input type="text" name="descripcion" placeholder="descripcion">
                    <input type="submit" value="Insertarcurso">
                    <a href='insertarcurso'>insertar</a>
                </form>

                <h2> Actualizar </h2>
                <form action="actualizarcurso" method="post">
                    <input type="text" name="nombre_u" placeholder="nombre" id="nombre">
                    <input type="number" name="id curso_u" placeholder="id curso">
                    <input type="submit" value="Actualizar" href= "actualizar">
                    <a href='actualizar'>actualizar</a>
                </form>
            {/if}
    </div>
        <footer class="footerContainer">
            {include file="footer.tpl"}
        </footer>

    </body>
</html>