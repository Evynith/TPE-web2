{include file="header.tpl"}
    
<body>
     <nav  id="menuContainer">
        {include file="nav.tpl"}
    </nav>

    <div class="Container">

        {foreach from=$lista_Alumnos item=alumno}

            <li>{$alumno->nombre}: {$alumno->apellido} : {$alumno->id_alumno} : {$alumno->curso}</li> 

        {/foreach}
        {if isset($userLevel) && ($userLevel == 1)}

        {/if}
    </div>
        <footer class="footerContainer">
            {include file="footer.tpl"}
        </footer>
</body>
</html>