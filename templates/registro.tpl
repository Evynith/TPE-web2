{include file="header.tpl"}

<body> 
    <div class="Container">
        <nav  id="menuContainer">
            {include file="nav.tpl"}
        </nav>

        <form action="registrarse" method="POST">
            <input type="text" name="registro_username" placeholder="Usuario">
            <input type="password" name="registro_password1" placeholder="Password">
            <input type="password" name="registro_password2" placeholder="Password">
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

        <footer class="footerContainer">
            {include file="footer.tpl"}
        </footer>
    </div>
</body>
</html>