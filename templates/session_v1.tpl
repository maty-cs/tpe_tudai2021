{include file="../templates/header-nav.tpl"}

<section class="formulario">
    <h2 class="subtitulo">Inicia Sesión</h2>
    <div class="contenedor-formulario">

        <form class="form" action="verify" method="POST" id="formContacto">
            {if $mensaje != ""}
                <h4>{$mensaje}</h4>
            {/if}
            <input type="email" name="email" class="control" id="mail" placeholder="Ingrese su e-mail" required> 
            <input type="password" name="password" class="control" id="pass" placeholder="Ingrese su contraseña" required> 
            <button class="btn-enviar">Enviar</button>

            <div class="link">
            <h3><a href="signIn">¿No posees cuenta? Crea una aquí</a></h3>
            </div>

        </form>

        <div class="img-formulario">
            {include file="../img/Online-report_Flatline.tpl"}
        </div>
        

    </div>
</section>

{include file="../templates/footer.tpl"}
