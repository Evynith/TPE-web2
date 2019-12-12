{include file="header.tpl"}

<body>
    <div class="Container">
        <nav  id="menuContainer">
            {include file="nav.tpl"}
        </nav>

        {foreach from=$lista_Cursos item=curso}
            <li><a href='curso/{$curso->id_curso}'> {$curso->nombre}, {$curso->profesor} </a> {if isset($userLevel) && ($userLevel == 1)}<a class="BtnA" href='borrarcurso/{$curso->id_curso}'>Borrar</a>{/if} </li>
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
        {/if}

        <footer class="footerContainer">
            {include file="footer.tpl"}
        </footer>
    </div>
</body>
</html>