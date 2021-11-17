{include file="../templates/header-nav.tpl"}

<section>
    <h2 class="subtitulo">Nuestros Productos</h2>
</section>

{if isset($users)}
    {foreach from=$users item=$user}
        {if $user->admin == 1}
            {$rol = $user->admin}
        {/if} 
    {/foreach}
    {if isset($rol)}        
        <button class="btn-action" id="addProducto">Añadir Producto</button>
        <button class="btn-action" id="updateProducto">Modificar Producto</button>
        <button class="btn-action" id="deleteProducto">Eliminar Producto</button>
        
        <form class="opciones" action="insertProduct" method="post">
            <div class="nombreProductos">
                <label for="nombre">Agregar Nombre del Producto</label>
                <input type="text" name="nombre" class="nombreProducto">
            </div>
            
            <div class="glutenProductos">
                <input type="checkbox" name="gluten" class="contieneGluten" value="">
                <label for="gluten">Gluten</label>
            </div>
        
            <div class="precioProductos">
                <label for="precio">Ingrese precio del producto</label>
                <input type="number" name="precio" class="agregarPrecio">
            </div>
        
            <div class="nombreProductos">
            <label for="categoria">Ingrese categoría del producto</label>
            <select name="categoria" class="filtro">
                {foreach from=$categorias item=$categoria}
                    <option value="{$categoria->categoria}">{$categoria->categoria}</option>
                {/foreach}
            </select>
            </div>
        
            <div class="botonesProductos">
                <button type="submit" class="agregarProducto">Agregar</button>
            </div>
        </form>
        
        <form class="opciones" action="updateProduct" method="post">
            <div class="nombreProductos">
                <label for="nombre">Modificar Nombre del Producto</label>
                <input type="text" name="nombre" class="nombreProducto">
            </div>
            
            <div class="glutenProductos">
                <input type="checkbox" name="gluten" class="contieneGluten" value="">
                <label for="gluten">Gluten</label>
            </div>
        
            <div class="precioProductos">
                <label for="precio">Modificar precio del producto</label>
                <input type="number" name="precio" class="agregarPrecio">
            </div>
        
            <div class="nombreProductos">
                <label for="categoria">Modificar categoría del producto</label>
                <select name="categoria" class="filtro">
                    {foreach from=$categorias item=$categoria}
                        <option value="{$categoria->categoria}">{$categoria->categoria}</option>
                    {/foreach}
                </select>
            </div>
        
            <div class="precioProductos">
                <label for="id">Ingrese id a modificar</label>
                <input type="number" name="id" class="editarId">
            </div>
        
            <div class="botonesProductos">
                <button type="submit">Editar</button>
            </div>
        </form>
        
        <form class="opciones" action="deleteProduct" method="post">
        
            <div class="precioProductos">
                <label for="id">Ingrese id a eliminar</label>
                <input type="number" name="id" class="editarId">
            </div>
        
            <div class="botonesProductos">
                <button type="submit"Borrar</button>
            </div>
        </form>
    {/if}
{/if}

<form action="filtrarResultados" method="post" class="seccionFiltro">
    <label for="categorias">Filtrar por Categoria</label>
    <select name="categorias" class="filtro">
        <option value="Todas">---</option>
        {foreach from=$categorias item=$categoria}
            <option value="{$categoria->categoria}">{$categoria->categoria}</option>
        {/foreach}
    </select>
    <button type="submit" id="btnFiltrar">Filtrar</button>
</form>

<section class="tablaProductos">
    <table>
        <thead class="headTabla">
            <tr>
                <th>Producto</th>
                <th>Categoría</th>
                <th>Gluten</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody id="agregado">
                {foreach from=$products item=$product}
                    <tr>  
                       <td>
                            <a class="nombreProducto" href="viewDetail/{$product->id_product}">{$product->nombre}</a>       
                        </td>
                        <td>{$product->categoria}</td>
                        <td>
                        {if $product->gluten}
                            Sí
                        {else}
                            No
                        {/if}
                        </td>
                        <td>${$product->precio}</td> 
                    </tr>
                {/foreach}
            
        </tbody>
    </table>
</section>

{if isset($users)}
    {foreach from=$users item=$user}
        {if $user->admin == 1}
            {$rol = $user->admin}
        {/if} 
    {/foreach}
    {if isset($rol)}        
        <button class="btn-action" id="addCategoria">Añadir Categoria</button>
        <button class="btn-action" id="updateCategoria">Modificar Categoria</button>
        <button class="btn-action" id="deleteCategoria">Eliminar Categoria</button>
        
        <form class="opciones" action="insertCategoria" method="post">
            <div class="nombreProductos">
                <label for="nombre">Agregar Categoria</label>
                <input type="text" name="categoria" class="nombreProducto">
            </div>
        
            <div class="precioProductos">
                <label for="descripcion">Ingrese descripción del producto</label>
                <textarea name="descripcion" class="agregarPrecio" cols="70" rows="1.5"></textarea>
            </div>
        
            <div class="nombreProductos">
            <label for="categoria">Ingrese conservación del tipo de producto</label>
            <input type="text" name="conservacion" class="nombreProducto">
            </div>
            <div class="nombreProductos">
            <label for="categoria">Ingrese tiempo de preparacion del tipo de producto</label>
            <input type="number" name="tiempoPreparacion" class="nombreProducto">
            </div>
        
            <div class="botonesProductos">
                <button type="submit">Agregar</button>
            </div>
        </form>
        
        <form class="opciones" action="updateCategoria" method="post">
            <div class="nombreProductos">
                <label for="nombre">Modificar Categoria</label>
                <input type="text" name="categoria" class="nombreProducto">
            </div>
            <div class="precioProductos">
                <label for="descripcion">Modifique descripción del producto</label>
                <textarea name="descripcion" class="agregarPrecio" cols="70" rows="1.5"></textarea>
            </div>
            <div class="nombreProductos">
                <label for="categoria">Modifique conservación del tipo de producto</label>
                <input type="text" name="conservacion" class="nombreProducto">
            </div>
            <div class="nombreProductos">
                <label for="categoria">Modifique tiempo de preparacion del tipo de producto</label>
                <input type="text" name="tiempoPreparacion" class="nombreProducto">
            </div>
            <div class="botonesProductos">
                <button type="submit">Editar</button>
            </div>
        </form>

        <form class="opciones" action="deleteCategoria" method="post">

            <div class="precioProductos">
                <label for="categoria">Ingrese categoria a eliminar</label>
                <input type="categoria" name="categoria" class="editarId">
            </div>

            <div class="botonesProductos">
                <button type="submit">Borrar</button>
            </div>
        </form>
    {/if}
{/if}

<section class="tablaProductos">
<table>
    <thead class="headTabla">
        <tr>
            <th>Categoría</th>
            <th>Descripción</th>
            <th>Conservación</th>
            <th>Tiempo de Preparación</th>
        </tr>
    </thead>
    <tbody id="agregado">
        {foreach from=$categorias item=$categoria}
            <tr>
                <td>{$categoria->categoria}</td>
                <td>{$categoria->descripcion}</td>
                <td>{$categoria->conservacion}</td>
                <td>{$categoria->tiempo_preparacion}min.</td>    
            </tr>
        {/foreach}
    </tbody>
</table>
</section>

<section class="envios">
    <h2 class="subtitulo">Envíos</h2>
    <div class="contenedor-envio">
        <div class="imagenEnvio">
            {include file="../img/New-Message-Flatline.tpl"}
        </div>
        <div class="info-envio">
            <div class="detalleEnvio">
                <h3>Disponibilidad y Plazo de Entrega</h3>
                <p>Los pedidos están disponibles para toda la zona sur de la Provincia de Buenos Aires.</p>
                <p>Su pedido tardará en llegar al destino dependiendo la lejanía a la sucursal.</p>
                <h3>Precauciones</h3>
                <p >El envío se realizará con las precauciones necesarias debido a la pandemia que se está atravesando</p>
            </div>
            <ol>
                <li>Se realizan entregas sin contacto siempre que se pueda. Retroceder a una distancia mayor a 6 pies mientras verifica la recepción de la entrega con el destinatario </li>
                <li>Limite el contacto con las superficies que se tocan con frecuencia durante las entregas, como timbres o manijas de puertas.</li>
                <li>El comprador debe aplicarse alcohol en gel en las manos antes y después de la entrega.</li>
                <li>Se recomienda desinfectar el envoltorio de entrega una vez ingresado en su domicilio.</li>
            </ol>
        </div>
    </div>
</section>

<section class="horario">
    <h2 class="subtitulo">Horarios</h2>
    <div class="contenedor-lista">
        <div class="listaHorario">
            <ul class="dias">
                <li>Lunes</li>
                <p>Atención de 8hs. a 12hs. y de 14hs. a 21hs.</p>
                <li>Martes</li>
                <p>Atención de 7:30hs. a 12hs. y de 15hs. 20hs.</p>
                <li>Miércoles</li>
                <p>Atención de 8hs. a  12hs. y de 14hs. a 21hs.</p>
                <li>Jueves</li>
                <p>Atención de 9hs a 13hs. y de 15hs. a 23:30hs.</p>
                <li>Viernes</li>
                <p>Atención de 8hs. a 13hs. y de 14hs. a 23hs.</p>
                <li>Sábado</li>
                <p>Atención de 10hs. a 17hs.</p>
                <li>Domingos y Feriados</li>
                <p>Atención de 14hs. a 18hs.</p>
            </ul>
          </div>
        <div class="img-horario">
            {include file="../img/Time_Flatline.tpl"}
        </div>
    </div>
</section>

{include file="../templates/footer.tpl"} 