{include file="header.tpl"}
    
<body>
    <div class="Container">

        <nav  id="menuContainer">
            {include file="nav.tpl"}
        </nav>

        {foreach from=$lista_Alumnos item=alumno}
            <li>{$alumno->nombre}: {$alumno->apellido} : {$alumno->id_alumno} : {$alumno->curso}</li> 
        {/foreach}

        {if isset($userLevel) && ($userLevel == 1)}

        {/if}
        
        <footer class="footerContainer">
            {include file="footer.tpl"}
        </footer>
    </div>
</body>
</html>