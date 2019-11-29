
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
        <form action="iniciarSesion" method="POST">
            <input type="text" name="username" placeholder="Usuario">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" value="iniciarSesion">
        </form>

    </div>
    
    <a href="../academia/registro" class="btnNvl3" >
        <p href="../academia/registro">No tienes cuenta?</p>
    </a>
    <a href="../academia/contraseña" class="btnNvl3" >
        <p href="../academia/contraseña">olvide mi contraseña</p>
    </a>

    <footer class="footerContainer">
        {include file="footer.tpl"}
    </footer>

</body>
</html>
