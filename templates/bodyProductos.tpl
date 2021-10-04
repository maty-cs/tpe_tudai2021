{include file="../templates/header-nav.tpl"}

<section>
    <h2 class="subtitulo">Nuestros Productos</h2>
</section>
<button id="addProducto">Añadir Producto</button>
<button id="updateProducto">Modificar Producto</button>
<button id="deleteProducto">Eliminar Producto</button>

<form class="opciones" action="insertProduct" method="post">
    <div class="nombreProductos">
        <label for="nombre">Agregar Nombre del Producto</label>
        <input type="text" name="nombre" id="nombreProducto">
    </div>
    
    <div class="glutenProductos">
        <input type="checkbox" name="gluten" id="contieneGluten" value="">
        <label for="gluten">Gluten</label>
    </div>

    <div class="precioProductos">
        <label for="precio">Ingrese precio del producto</label>
        <input type="number" name="precio" id="agregarPrecio">
    </div>

    <div class="nombreProductos">
    <label for="categoria">Ingrese categoría del producto</label>
    <input type="text" name="categoria" id="nombreProducto">
    </div>

    <div class="botonesProductos">
        <button type="submit" id="agregarProducto">Agregar</button>
        <button type="submit" id="editar">Editar</button>
        <button id="borrarUltimo">Borrar Último</button>
    </div>
</form>

<form class="opciones" action="updateProduct" method="post">
    <div class="nombreProductos">
        <label for="nombre">Modificar Nombre del Producto</label>
        <input type="text" name="nombre" id="nombreProducto">
    </div>
    
    <div class="glutenProductos">
        <input type="checkbox" name="gluten" id="contieneGluten" value="">
        <label for="gluten">Gluten</label>
    </div>

    <div class="precioProductos">
        <label for="precio">Modificar precio del producto</label>
        <input type="number" name="precio" id="agregarPrecio">
    </div>

    <div class="nombreProductos">
    <label for="categoria">Modificar categoría del producto</label>
    <input type="text" name="categoria" id="nombreProducto">
    </div>

    <div class="precioProductos">
        <label for="id">Ingrese id a modificar</label>
        <input type="number" name="id" id="editarId">
    </div>

    <div class="botonesProductos">
        <button type="submit" id="editar">Editar</button>
    </div>
</form>

<form class="opciones" action="deleteProduct" method="post">

    <div class="precioProductos">
        <label for="id">Ingrese id a eliminar</label>
        <input type="number" name="id" id="editarId">
    </div>

    <div class="botonesProductos">
        <button type="submit" id="editar">Borrar</button>
    </div>
</form>



<section class="seccionFiltro">
    <label for="filtrar">Filtro</label>
    <input type="text" placeholder="Filtrar resultados" id="filtro">
    <button id="btnFiltrar">Filtrar</button>
</section>

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
                       <td>
                            <a class="nombreProducto" href="viewTask/{$product->id_product}">{$product->nombre}</a>       
                        </td>
                        <td>{$product->categoria}</td>
                        <td>
                        {if $product->gluten}
                            Sí
                            {else}
                                No
                        {/if}
                        </td>
                        <td>${$product->precio}</td> <tr>  
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
                <p >El envío se realizará con las Precaucionesnecesarias debido a la pandemia que se está atravezando</p>
            </div>
            <ol>
                <li>Se realizan entregas sin contacto, siempre que se pueda. Retroceder a una distancia mayor a 6 pies mientras verifica la recepción de la entrega con el destinatario </li>
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