{include file="../templates/header.tpl"}

<section class="formulario">
    <h2 class="subtitulo">Registrate</h2>
    <div class="contenedor-formulario">

        <form class="form" action="createUser" method="POST" id="formContacto">
            <input type="email" name="email" class="control" id="mail" placeholder="Ingrese su e-mail" required> 
            <input type="password" name="password" class="control" id="pass" placeholder="Ingrese su contraseña" required> 
            <button class="btn-enviar">Enviar</button>
        </form>
        <div class="img-formulario">
            {include file="../img/Information-flow_Monochromatic.tpl"}
        </div>

    </div>
</section>

{include file="../templates/footer.tpl"}