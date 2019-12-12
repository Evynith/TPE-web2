{include file="header.tpl"}

<body>
    <div class="Container"> 

        <nav  id="menuContainer">
            {include file="nav.tpl"}
        </nav>

        {if $mensaje}
            {$mensaje}
        {/if}

        <form action="actualizarPass" method="POST">
            <input type="text" name="usuarioPerdido" placeholder="Usuario">
            <select name="selectPass"  placeholder="Elige una pregunta">
                <option value="Como se llamó tu primer mascota?">Como se llamó tu primer mascota?</option> 
                <option value="Cual fue la calle de tu primer casa?" selected>Cual fue la calle de tu primer casa?</option>
                <option value="Como se llama tu mejor amigo?">Como se llama tu mejor amigo?</option>
            </select>
            <input type="text" name="respuestaPass" placeholder="Tu respuesta">
            <input type="password" name="nuevaPass" placeholder="Nueva contraseña">
            <input type="submit" value="Actualizar">
        </form>
        
        <footer class="footerContainer">
            {include file="footer.tpl"}
        </footer>
    </div>
</body>
</html>