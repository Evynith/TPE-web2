<div class="aMostrar">
    <div class="barraNav">
        <figure class="logo">
            <a href="../academia/index"> <img href="../academia/index" alt="Academia de heroes" class="logo"></a>
        </figure>

        <ul class="navPC">
            <li><a class="btnNav" href="../academia/registro"> Registro</a></li>
            <li><a class="btnNav" href="../academia/cursos"> Cursos</a></li>
            <li><a class="btnNav" href="contacto"> Quiénes somos</a></li>
            
            {if isset($userName)}
                <li>
                    <span> {$userName} </span>
                    <a class="btnNav" href="../academia/logout">LOGOUT</a>
                </li>
            {/if}
            

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