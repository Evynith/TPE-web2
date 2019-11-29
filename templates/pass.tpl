
{include file="header.tpl"}

<body>
     <nav  id="menuContainer">
        {include file="nav.tpl"}
    </nav>

    <div class="Container">

        {if $error}
            <div class="alert">
                {$error}
            </div>
        {/if}
        <form action="contraseña" method="POST">
            <input type="text" name="usuarioPerdido" placeholder="Usuario">
            <input type="submit" value="enviar">
        </form>

        {if $nueva}
            <div class="alert">
                {$nueva}
            </div>
             <form action="nuevaContraseña" method="POST">
                <input type="password" name="nuevaPass" placeholder="Nueva contraseña">
                <input type="submit" value="enviar">
            </form>
        {/if}

    </div>

    <footer class="footerContainer">
        {include file="footer.tpl"}
    </footer>

</body>
</html>
