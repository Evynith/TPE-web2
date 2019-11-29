
{include file="header.tpl"}

<body> 
    <nav  id="menuContainer">
        {include file="nav.tpl"}
    </nav>

    <div class="Container">

        <form action="registrarse" method="POST">
            <input type="text" name="registro_username" placeholder="Usuario">
            <input type="password" name="registro_password" placeholder="Password">
            <input type="password" name="registro_password" placeholder="Password">
            <select name="select"  placeholder="Elige una pregunta">
                <option value="Como se llamó tu primer mascota?">Como se llamó tu primer mascota?</option> 
                <option value="Cual fue la calle de tu primer casa?" selected>Cual fue la calle de tu primer casa?</option>
                <option value="Como se llama tu mejor amigo?">Como se llama tu mejor amigo?</option>
            </select>
            <input type="text" name="respuesta" placeholder="Tu respuesta">
             <input type="submit" value="Registrarse">
        </form>
    
    {if $mensaje}
        <div class="alert">
            {$mensaje}
        </div>
    {/if}

    </div>

    <footer class="footerContainer">
        {include file="footer.tpl"}
    </footer>
</body>
</html>