{include file="header.tpl"}

            {foreach from=$lista_Cursos item=curso}

                <li>{$curso->nombre}: {$curso->profesor} : {$curso->id_curso}- <a href='borrarcurso/{$curso->id_curso}'>Borrar</a></li>

            {/foreach}

            <form action="insertar" method="post">
                <input type="text" name="nombre" placeholder="nombre" id="nombre">
                <input type="text" name="profesor" placeholder="profesor">
                <input type="number" name="agno_correspondiente" placeholder="agno_correspondiente">
                <input type="submit" value="Insertar" href= "insertar">
                <a href='insertarcurso'>insertar</a>
            </form>

            <h2> Actualizar </h2>
            <form action="actualizar" method="post">
                <input type="text" name="nombre_u" placeholder="nombre" id="nombre">
                <input type="number" name="id curso_u" placeholder="id curso">
                <input type="submit" value="Actualizar" href= "actualizar">
                <a href='actualizar'>actualizar</a>
            </form>

    </body>
</html>