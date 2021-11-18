{literal}
    <section id="containerComentarios" class="comentarios">
        <div class="comentario-head">
            <h1>{{titulo}}</h1>
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
