{include file="header.tpl"}

<body>
    <nav  id="menuContainer">
        {include file="nav.tpl"}
    </nav>
    <div class="homeContainer">

        <header>
            <div class="carousel">
                <div>
                    <img id="imagen" class="imgCarousel" src="../academia/images/uno.jpeg" alt="1"/>
                </div>
                <div class="btnCarousel">
                    <button id="atras"> &#60 </button>
                    <button id="siguiente"> &#62 </button>
                </div>
            </div>
        </header>

        <a href="../academia/login" class="btnNvl1 registroHome" >
            {* <figure><img href="../academia/login" src="../academia/images/registro.png" alt="chica con mascara" class="imagenPromocional"></figure> *}
            <h1 href="../academia/login">Logueate!</h1>
        </a>

        <a href="../academia/alumnos" class="btnNvl1 alumnos">
            <h1 href="../academia/alumnos">Alumnos</h1>
        </a>
        
        <a href="../academia/cursos" class="btnNvl1 ranking">
            {* <figure><img href="../academia/cursos" src="images/" alt="curso en el podio, primer puesto" class="imagenPromocional"></figure> *}
            <h1 href="../academia/cursos">Cursos</h1>
        </a>

        <aside>
            <h2>Noticias</h2>
            <div class="box">
                <a class="twitter-timeline" data-theme="dark" href="https://twitter.com/EvyWraith?ref_src=twsrc%5Etfw">Tweets by EvyWraith</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
            </div>
        </aside>

        <a class="btnNvl2 video">
            {* <figure>
                <img src="" class="imagenPromocional">
                <figcaption><h2>Promocional</h2></figcaption>
            </figure> *}
            <h2>Promocional</h2>
        </a>
        {if isset($userLevel) && ($userLevel == 1)}
            <a href="../academia/usuarios" class="btnNvl2 plan">
                <h2 href="../academia/usuarios">Usuarios</h2>
            </a>
        {/if}

        <a class="btnNvl2 galeria">
            {* <figure><img src="images/" alt="chico en encuentro de la academia" class="imagenPromocional"></figure> *}
            <h2>Galeria</h2>
        </a>

    </div>
    <footer class="footerContainer">
        {include file="footer.tpl"}
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="./js/javascript.js"></script>

    </body>
</html>