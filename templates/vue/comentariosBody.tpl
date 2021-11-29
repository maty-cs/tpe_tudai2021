
{literal}
    <section id="containerComentarios" class="comentarios">
    <div class="comentario-head">
        <h1>{{titulo}}</h1>
{/literal}

    {if isset($currentUser)}
        <div class="addComment mostrar-form">
            <div class="nombreProductos">        
                <label for="comentario">Tu comentario</label>
                <textarea name="comentario" id="userComment" class="textarea" cols="30" rows="10" placeholder="¿Qué piensas?" required></textarea>
            </div>
            <div class="submitComment">
                <div>
                    <label for="reseña">Añade una reseña</label>
                    <select name="reseña" id="userReview" class="filtro" required>
                        <option value="1">1 estrella</option>
                        <option value="2">2 estrellas</option>
                        <option value="3">3 estrellas</option>
                        <option value="4">4 estrellas</option>
                        <option value="5">5 estrellas</option>
                    </select>
                </div>
                <button type="submit" class="btn-comment" id="addComment">Publicar</button>
            </div>
        </div>

    </div>
   
        <section class="conteinerFilter">
            <form class="seccionFiltro">
                <label for="categorias">Ordenar por Puntaje</label>
                <select name="orden" id="order" class="filtro">
                    <option value="none">---</option>
                    <option value="ASC">Ascendente</option>
                    <option value="DESC">Descendiente</option>
                </select>
                <button type="submit" class="btn-comment" id="btnFilter">Ordenar</button>
            </form>
            <form class="seccionFiltro">
                <label for="categorias">Filtrar por Puntaje</label>
                <select name="points" id="points" class="filtro">
                    <option value="none">---</option>
                    {for $i = 0 to 5}
                        <option value="{$i}">{$i}</option> 
                    {/for}
                </select>
                <button type="submit" class="btn-comment" id="btnPoints">Filtrar</button>
            </form>
        </section>

        {foreach from=$users item=user}
            {if $currentUser = $user->email && $user->admin == 1}
                {literal}
                        <div class="bodyComentario">
                            <ul>    
                                <li v-for="comentario in comentarios" class="caja-comentario">
                                    <div class="comentario-top">
                                        <div class="perfil">
                                        <div class="imagen-perfil">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAX1JREFUSEu1leExRDEUhb+tABWgAnRABagAHVABHaACVMBWQAfogApQAfPtJDvZbJK32bGZyY/33n333Hty7smIFa/RivOzCMARcAjshm1Nb2E/AeNWkS2AfeAO2Bro8gM4A15KcTWAK+Cyk75z4Db/pwRg4HVn8hh+Adyk/+YA0vK8ZPL420FKVw4gn5sFgB9A2u7Dt9PwvFaINcd2fJ8CqJbHSvVzrQMtKo8BFTYjU6s7qQBsAN/Zt3XgqxL/ANjlDIDa3vknAHPt5QC/jcPtpWiaOz2DFoD0eMi27pJKn6Wptia5U4AWRb3KfY+2kgK0DvkzaFsJurQPZ6Ykab8XD7kkU/Xv+6LPBBDlmM9DUaYi54OmEqSutXTZ1yTAbqcGOWQV0qaC8hmI+TxkHdcu42pahUH5hJpcA9P3YzdW7R1hbKqkQbOLVSzjqKVZad5oqkSKakqJxci5ttB14aSHKr9uaYlWos6lSwVNTK05bb1T1BO/yKXfk28u9g8XyEkZRdC/1QAAAABJRU5ErkJggg=="/>
                                        </div>
                                            <div class="nombre-usuario">
                                            <strong>{{comentario.usuario}}</strong>
                                            </div>
                                            </div>
                                        <div class="comentario-puntaje">
                                            <div v-if="comentario.puntaje === '1'">
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bx-star' ></i>
                                                <i class='bx bx-star' ></i>
                                                <i class='bx bx-star' ></i>
                                                <i class='bx bx-star' ></i>
                                            </div>
                                            <div v-else-if="comentario.puntaje === '2'">
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bx-star' ></i>
                                                <i class='bx bx-star' ></i>
                                                <i class='bx bx-star' ></i>
                                                </div>
                                            <div v-else-if="comentario.puntaje === '3'">
                                            <i class='bx bxs-star' ></i>
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bx-star' ></i>
                                                <i class='bx bx-star' ></i>
                                                </div>
                                            <div v-else-if="comentario.puntaje === '4'">
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bx-star' ></i>
                                            </div>
                                            <div v-else>
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bxs-star' ></i>
                                            </div>
                                        </div>
                                    </div>
                    
                                    <div class="comentario-cliente">
                                        <p>{{comentario.comentario}}</p>
                                    </div>
                                    <div class="deleteComment">
                                        <button class="btn-delete">borrar</button>
                                        <p>{{comentario.id_comentario}}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                {/literal}
            {else}
                {literal}
                    </div>
                        <div class="bodyComentario">
                            <ul>    
                                <li v-for="comentario in comentarios" class="caja-comentario">
                                    <div class="comentario-top">
                                        <div class="perfil">
                                        <div class="imagen-perfil">
                                            
                                        </div>
                                            <div class="nombre-usuario">
                                            <strong>{{comentario.usuario}}</strong>
                                            </div>
                                            </div>
                                        <div class="comentario-puntaje">
                                            <div v-if="comentario.puntaje === '1'">
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bx-star' ></i>
                                                <i class='bx bx-star' ></i>
                                                <i class='bx bx-star' ></i>
                                                <i class='bx bx-star' ></i>
                                            </div>
                                            <div v-else-if="comentario.puntaje === '2'">
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bx-star' ></i>
                                                <i class='bx bx-star' ></i>
                                                <i class='bx bx-star' ></i>
                                            </div>
                                            <div v-else-if="comentario.puntaje === '3'">
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bx-star' ></i>
                                                <i class='bx bx-star' ></i>
                                            </div>
                                            <div v-else-if="comentario.puntaje === '4'">
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bx-star' ></i>
                                            </div>
                                            <div v-else>
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bxs-star' ></i>
                                                <i class='bx bxs-star' ></i>
                                            </div>
                                        </div>
                                    </div>
                
                                    <div class="comentario-cliente">
                                        <p>{{comentario.comentario}}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                {/literal}           
            {/if}
        {/foreach}
        
    {else}   
        {literal}
    </div>
    <section class="conteinerFilter">
        <form class="seccionFiltro">
            <label for="categorias">Ordenar por Puntaje</label>
            <select name="orden" id="order" class="filtro">
                <option value="none">---</option>
                <option value="ASC">Ascendente</option>
                <option value="DESC">Descendiente</option>
            </select>
            <button type="submit" class="btn-comment" id="btnFilter">Ordenar</button>
        </form>
        <form class="seccionFiltro">
            <label for="categorias">Filtrar por Puntaje</label>
            {/literal}
                <select name="points" id="points" class="filtro">
                    <option value="none">---</option>
                    {for $i = 0 to 5}
                        <option value="{$i}">{$i}</option> 
                    {/for}
                </select>
            {literal}
            <button type="submit" class="btn-comment" id="btnPoints">Filtrar</button>
        </form>
    </section>

        <div class="bodyComentario">
            <ul>    
                <li v-for="comentario in comentarios" class="caja-comentario">
                    <div class="comentario-top">
                        <div class="perfil">
                        <div class="imagen-perfil">
                            
                        </div>
                            <div class="nombre-usuario">
                            <strong>{{comentario.usuario}}</strong>
                            </div>
                            </div>
                        <div class="comentario-puntaje">
                            <div v-if="comentario.puntaje === '1'">
                                <i class='bx bxs-star' ></i>
                                <i class='bx bx-star' ></i>
                                <i class='bx bx-star' ></i>
                                <i class='bx bx-star' ></i>
                                <i class='bx bx-star' ></i>
                            </div>
                            <div v-else-if="comentario.puntaje === '2'">
                                <i class='bx bxs-star' ></i>
                                <i class='bx bxs-star' ></i>
                                <i class='bx bx-star' ></i>
                                <i class='bx bx-star' ></i>
                                <i class='bx bx-star' ></i>
                            </div>
                            <div v-else-if="comentario.puntaje === '3'">
                                <i class='bx bxs-star' ></i>
                                <i class='bx bxs-star' ></i>
                                <i class='bx bxs-star' ></i>
                                <i class='bx bx-star' ></i>
                                <i class='bx bx-star' ></i>
                            </div>
                            <div v-else-if="comentario.puntaje === '4'">
                                <i class='bx bxs-star' ></i>
                                <i class='bx bxs-star' ></i>
                                <i class='bx bxs-star' ></i>
                                <i class='bx bxs-star' ></i>
                                <i class='bx bx-star' ></i>
                            </div>
                            <div v-else>
                                <i class='bx bxs-star' ></i>
                                <i class='bx bxs-star' ></i>
                                <i class='bx bxs-star' ></i>
                                <i class='bx bxs-star' ></i>
                                <i class='bx bxs-star' ></i>
                            </div>
                        </div>
                    </div>

                    <div class="comentario-cliente">
                        <p>{{comentario.comentario}}</p>
                    </div>
                </li>
            </ul>
        </div>
        {/literal}
    {/if}
</section>
