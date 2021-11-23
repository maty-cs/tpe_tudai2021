{include file="../templates/header.tpl"}
<section class="horario">
<h2 class="subtitulo">{$producto->nombre}</h2>
<div class="contenedor-lista">
    <div class="listaHorario">
        <div class="detalle">
            <ul class="dias">
                <li >Código de producto: <p id="productoID">{$producto->id_product}</p></li>
                <li>¿Contiene gluten? 
                {if $producto->gluten}
                    Sí
                    {else}
                        No
                {/if} contiene</li>
                <p>Se recomienda guardar el producto, luego de su consumo, en recipientes cerrados herméticamente todos aquellos alimentos sin gluten  sin tener contacto con alimentos que contengan gluten.
                Debe tenerse en cuenta que si productos sin gluten se guardan en la parte superior de la heladera, se evitará  la contaminación por derramamiento.</p>
                <li>{$producto->categoria}</li>
                {foreach from=$categorias item=$categoria}
                    {if $categoria->categoria == $producto->categoria}                    
                        <p>{$categoria->descripcion}</p>
                        <li>¿Por cuánto tiempo se puede conservar el producto?</li>
                        <p>Es recomendado conservar {$categoria->conservacion}.</p>
                        <li>¿Cuánto debo esperar a que esté listo mi pedido?</li>
                        <p>Alrededor de {$categoria->tiempo_preparacion} minutos.</p>
                        <li><img src="{$imagen->path}" alt="{$producto->nombre}"></li>
                        <li>Precio del producto seleccionado</li>
                        <p>${$producto->precio}</p>
                    {/if}
                {/foreach}
                <p><a href="home" > Volver a Home</a></p>
            </ul>
            {include file="../templates/vue/comentariosBody.tpl"}
        </div>
    </div>
</div>
{include file="../templates/footer.tpl"}