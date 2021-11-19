
{literal}
    <section id="containerComentarios" class="comentarios">
    <div class="comentario-head">
    <h1>{{titulo}}</h1>
{/literal}

    {if isset($users)}
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
    {/if}

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
    </section>
{/literal}
