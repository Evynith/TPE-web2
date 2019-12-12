{include file="header.tpl"}
    
<body>
    <div class="Container">
        <nav  id="menuContainer">
            {include file="nav.tpl"}
        </nav>

        {foreach from=$usuarios item=usuario}

            <li>{$usuario->email}: {$usuario->password} : {$usuario->pregunta} : {$usuario->respuesta} : {$usuario->nivel}- <a class ="BtnA" href='borrarUsuario/{$usuario->id}'>Borrar</a> </li> 

        {/foreach}

        <h1> Actualizar </h1>
            <form action="actualizarUsuario" method="POST">
                <input type="number" name="nivel" placeholder="nivel" >
                <input type="number" name="id_usuario" placeholder="id usuario">
                <input type="submit" value="actualizar" href= "actualizarUsuario">
            </form>
        <footer class="footerContainer">
            {include file="footer.tpl"}
        </footer>
    </div>
</body>
</html>