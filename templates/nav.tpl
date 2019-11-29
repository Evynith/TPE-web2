<div class="aMostrar">
    <div class="barraNav">
        <figure class="logo">
            <img src="" alt="Academia de heroes" class="logo">
        </figure>

        <ul class="navPC">
            <li><a class="btnNav" href="registro"> Registro</a></li>
            <li><a class="btnNav" href="materias"> Cursos</a></li>
            <li><a class="btnNav" href="contacto"> Quiénes somos</a></li>
            <li>
                {if isset($userName)}
                    <div class="btnNav">
                        <span> {$userName} </span>
                        <a class="btnNav" href="../academia/logout">LOGOUT</a>
                    </div>
                {/if}
            </li>

        </ul>

        <button class="navMovil">Menú</button>

        <ul class="invisible" id="menuNavMovil">
            <li><a href="">Inicio</a></li>
            <li><a href="registro">Registro</a></li>
            <li><a href="materias">Plan de estudio</a></li>
            <li><a href="contacto">Quiénes somos</a></li>
        </ul>
    </div>
</div>