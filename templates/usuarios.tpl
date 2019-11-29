{include file="header.tpl"}
    
<body>
     <nav  id="menuContainer">
        {include file="nav.tpl"}
    </nav>

    <div class="Container">

        {foreach from=$usuarios item=usuario}

            <li>{$usuario->email}: {$usuario->password} : {$usuario->pregunta} : {$usuario->respuesta} : {$usuario->nivel}- <a href='borrarUsuario/{$usuario->id}'>Borrar</a> </li> 

        {/foreach}

        <h1> Actualizar </h1>
            <form action="actualizarUsuario" method="POST">
                <input type="number" name="nivel" placeholder="nivel" >
                <input type="number" name="id_usuario" placeholder="id usuario">
                <input type="submit" value="actualizar" href= "actualizarUsuario">
            </form>
    </div>
        <footer class="footerContainer">
            {include file="footer.tpl"}
        </footer>

</body>
</html>