{include file="../templates/header-nav.tpl"}

<section>
    <h1>Lista de usuarios de la página</h1>
</section>

{if isset($users)}
{foreach from=$users item=$user}
    {if $user->admin == 1}
        {$rol = $user->admin}
    {/if} 
{/foreach}
{if isset($rol)}        
    <section>
        <button id="giveRol">Dar Rol</button>
        <button id="deleteRol">Quitar Rol</button>
        
        <form class="opciones" action="giveRol" method="post">
            <div>
                <label for="id">Indique id del usuario a dar rol</label>
                <select name="ids" class="filtro">
                    {foreach from=$users item=$user}
                        <option value="{$user->id_user}">{$user->id_user}</option>
                    {/foreach}
                </select>        
            </div>
            <div class="botonesProductos">
                <button type="submit" class="agregarProducto">Agregar</button>
            </div>
        </form>
        
        <form class="opciones" action="quitarAdmin" method="post">
            <div>
                <label for="id">Indique id del usuario a quitar rol</label>
                <select name="ids" class="filtro">
                {foreach from=$users item=$user}
                    <option value="{$user->id_user}">{$user->id_user}</option>
                {/foreach}
            </select>             
            </div>
            <div class="botonesProductos">
                <button type="submit">Quitar</button>
            </div>
        </form>
    </section>

    <section class="tablaProductos">
        <table>
            <thead class="headTabla">
                <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Rol</th>
                </tr>
            </thead>

            <tbody>
                {if isset($users)}
                    {foreach from=$users item=$user}
                        <tr>
                            <td>{$user->id_user}</td>
                            <td>{$user->email}</td>
                            <td>{if $user->admin == '1'}
                                    Admin
                                {else}
                                    Usuario
                                {/if}
                            </td>
                        </tr>       
                    {/foreach}
                {/if}
            </tbody>
        </table>
    </section>
{/if}
{/if}

{include file="../templates/footer.tpl"} 