<?php require_once('View/layout/Header1.php'); ?>
<?php if (isset($seeEvent) && is_object($seeEvent)) : ?>
    <div class="envase">
        <figure>
            <img src="<?= baseUrl ?>Uploads/events/<?= $seeEvent->image ?>" alt="compumedica servicios">
        </figure>
    </div>
    <section class="bg-lightq">
        <div class="container-fluid">
            <div class="row">
                <?php if (isset($_SESSION['save']) && $_SESSION['save'] == "exitoso") : ?>
                    <div class="row" id="alerta">
                        <div class="col-md-12 ">
                            <div class=" text-center alert alert-success alert-dismissible fade show" role="alert">
                                <strong> <i class="bi bi-controller"></i> Felicidades <?= $_SESSION['User']->name ?> <?= $_SESSION['User']->surname ?> tu registro ha sido
                                    exitoso...! Procesaremos tu informacion y en tu menu de compras aparecera un boton extra llamado "Evento" donde tendras el resto de la informacion
                                    adicionalmente enviaremos un mensaje de texto al numero registrado.
                                </strong>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?= utilities::deleteSession(); ?>
                <div class="py-3 px-4">
                    <?php if ($seeEvent->finalized === "No") : ?>
                        <div class="badge bg-success text-wrap" style="width: 10rem;">
                            TORNEO - EN CURSO
                        </div>
                    <?php else : ?>
                        <div class="badge bg-danger text-wrap" style="width: 10rem;">
                            TORNEO - FINALIZADO
                        </div>
                    <?php endif; ?>

                    <h2 class="text-title lh-1"><?= $seeEvent->name ?></h2>
                </div>
                <div class="text-description">
                    <?php if ($seeEvent->finalized === "No") : ?>
                        <p><?= $seeEvent->description ?></p>
                    <?php else : ?>
                        <p class="text-center">A continuacion te mostraremos los resultados de lo que fue este espectacular evento donde se vivieron momentos espectaculares gracias al nivel de jugabilidad de cada uno de nuestros participantes, tendremos el gusto
                            de mostrarles en un video los mejores clips de estas partidas. <br>"Adicionalmente Quick Shopping agradece a todos ustedes por participar" </p>
                        <div class="row justify-content-center">
                            <div class="col-md-12 col-xl-6">
                                <div class="embed-responsive embed-responsive-16by9 mt-2 mb-2">
                                    <iframe width="100%" height="350" src="<?= $seeEvent->link ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if ($seeEvent->finalized === "No") : ?>
                        <div class="row">
                            <div class="py-3 px-4">
                                <h2 class="text-title lh-1">DESCRIPCION DEL EVENTO </h2>
                                <ul style="list-style-type: none;">
                                    <li class="fs-4"><b>Fecha de inicio:</b> <?= $seeEvent->create_at ?></li>
                                    <li class="fs-4"><b>Fecha de Fin:</b> <?= $seeEvent->expires_in ?></li>
                                    <li class="fs-4"><b>Numero de participantes:</b> <?= $seeEvent->numberParticipants ?></li>
                                    <li class="fs-4"><b>Metodo de juego:</b> <?= $seeEvent->type ?></li>
                                    <li class="fs-4">
                                        <?php if (isset($_SESSION['User'])) : ?>

                                            <?php if (isset($seeUser) && $_SESSION['User']->idclient == $seeUser->Clients_id) : ?>
                                                <button type="button" class="btn btn-b mt-2">
                                                    Felicidades ya estas registrado
                                                </button>
                                                <div class="col-md-12 ">
                                                    <div class="mt-2 text-center alert alert-info alert-dismissible fade show" role="alert">
                                                        <strong> <i class="bi bi-controller"></i> Recuerda <?= $_SESSION['User']->name ?> </strong> debes estar pendiente a la fecha de finalizacion
                                                        ya que apartir de esta hora seran publicados los datos necesarios para que te unas a nuestra sala de juego y demuestres tus avilidades
                                                        <div class="d-grid gap-2">
                                                            <a href="<?= baseUrl ?>Clients/myProfile&id=<?= $_SESSION['User']->idclient ?>" class="btn fs-6  btn-fixed p-1">IR A MI PERFIL</a>

                                                        </div>


                                                    </div>
                                                <?php else : ?>
                                                    <button type="button" class="btn btn-b" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                        CLICK PARA REGISTRARTE EN ESTE EVENTO
                                                    </button>
                                                <?php endif; ?>

                                            <?php else : ?>
                                                <a href="#" onclick="alert('Debes iniciar Session...!');" class="btn btn-success">CLICK PARA REGISTRARTE EN ESTE EVENTO</a>
                                            <?php endif; ?>
                                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title text-dark" id="staticBackdropLabel">Registro de participacion</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?= baseUrl ?>Participants/register" method="POST">
                                                                <div class="mb-3">
                                                                    <label for="exampleFormControlTextarea1" class="form-label text-dark">Tienes buenas habilidades en este juego? cuentanos cueles:</label>
                                                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="reason" required rows="3"></textarea>
                                                                </div>
                                                                <div class="mt-2">
                                                                    <label for="" class="text-dark">Numero Celular:</label>
                                                                    <input type="number" class="form-control" required name="telephone">
                                                                </div>
                                                                <label for="" class="text-dark mx-2 mt-3">Aceptas teminos:</label>
                                                                <div class="form-check form-check-inline text-dark">
                                                                    <input class="form-check-input" name="terms" type="checkbox" required value="Si">
                                                                    <label class="form-check-label" for="inlineCheckbox1">Si</label>
                                                                </div>
                                                                <div class="form-check form-check-inline text-dark">
                                                                    <input class="form-check-input" name="terms" type="checkbox" value="No">
                                                                    <label class="form-check-label" for="inlineCheckbox2">No</label>
                                                                </div>
                                                                <label for="" class="text-dark mx-2 mt-3">El juego debes tenerlo instalado, cuentas con esto?</label> <br>
                                                                <div class="form-check form-check-inline text-dark">
                                                                    <input class="form-check-input" name="install" type="checkbox" required value="Si">
                                                                    <label class="form-check-label" for="inlineCheckbox1">Si</label>
                                                                </div>
                                                                <div class="form-check form-check-inline text-dark">
                                                                    <input class="form-check-input" name="install" type="checkbox" value="No">
                                                                    <label class="form-check-label" for="inlineCheckbox2">No</label>
                                                                </div>
                                                                <input type="hidden" name="Events_id" value="<?= $seeEvent->idevent ?>">
                                                                <input type="hidden" name="Clients_id" value="<?= isset($_SESSION['User']) ? $_SESSION['User']->idclient : "" ?>">

                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-success">Registrar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                    </li>
                                </ul>
                            </div>
                        <?php else : ?>

                            <div class="py-2 px-4">
                                <h2 class="text-title lh-1">CLASIFICACION CUARTOS DE FINAL <i class="bi bi-dice-4-fill"></i></h2>
                            </div>
                            <?php $idEvent = $seeEvent->idevent ?>
                            <?php $participant = utilities::classificationQuarters($idEvent); ?>
                            <div class="row justify-content-center">
                                <?php while ($result = $participant->fetch_object()) : ?>
                                    <div class="col-sm-12 col-md-4 col-lg-3 col-xs-3">
                                        <a class="text-decoration-none" href="<?= baseUrl ?>Clients/myProfile&id=<?= $result->Clients_id ?>">
                                            <div class="card mb-3 border-0 border-section" style="background: rgb(0, 0, 0, .9);">
                                                <div class="row g-0">
                                                    <div class="col-3">
                                                        <img src="<?= baseUrl ?>Uploads/profiles/<?= $result->image ?>" class="rounded-start p-0 border-0" height="70" width="90" alt="...">
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="card-body p-1 lh-1 text-center">
                                                            <h6 class="card-title text-white lh-1"><?= $result->email ?></h6>
                                                            <b class="apodo text-white"><?= $result->nickname ?></b>
                                                            <p class="card-text text-end"><small class="text-muted"><?= $result->status ?></small></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    </a>
                                <?php endwhile; ?>
                            </div>


                            <div class="py-2 px-4">
                                <h2 class="text-title lh-1">CLASIFICACION SEMIFINAL <i class="bi bi-dice-5-fill"></i></h2>
                            </div>
                            <?php $idEvent = $seeEvent->idevent ?>
                            <?php $participant = utilities::classificationSemifinal($idEvent); ?>
                            <div class="row justify-content-center">
                                <?php while ($result = $participant->fetch_object()) : ?>
                                    <div class="col-sm-12 col-md-4 col-lg-3 col-xs-3">
                                        <a class="text-decoration-none" href="<?= baseUrl ?>Clients/myProfile&id=<?= $result->Clients_id ?>">
                                            <div class="card mb-3 border-0 border-section" style="background: rgb(0, 0, 0, .9);">
                                                <div class="row g-0">
                                                    <div class="col-3">
                                                        <img src="<?= baseUrl ?>Uploads/profiles/<?= $result->image ?>" class="rounded-start p-0 border-0" height="70" width="90" alt="...">
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="card-body p-1 lh-1 text-center">
                                                            <h6 class="card-title text-white lh-1"><?= $result->email ?></h6>
                                                            <b class="apodo text-white"><?= $result->nickname ?></b>
                                                            <p class="card-text text-end"><small class="text-muted"><?= $result->status ?></small></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endwhile; ?>
                            </div>

                            <div class="py-2 px-4">
                                <h2 class="text-title lh-1">CLASIFICACION FINAL <i class="bi bi-flag-fill"></i></h2>
                            </div>
                            <?php $idEvent = $seeEvent->idevent ?>
                            <?php $participant = utilities::classificationSemifinal($idEvent); ?>
                            <div class="row justify-content-center">
                                <?php while ($result = $participant->fetch_object()) : ?>
                                    <div class="col-sm-12 col-md-4 col-lg-3 col-xs-3">
                                        <a class="text-decoration-none" href="<?= baseUrl ?>Clients/myProfile&id=<?= $result->Clients_id ?>">
                                            <div class="card mb-3 border-section border-0" style="background: rgb(0, 0, 0, .9);">
                                                <div class="row g-0">
                                                    <div class="col-3">
                                                        <img src="<?= baseUrl ?>Uploads/profiles/<?= $result->image ?>" class="rounded-start p-0 border-0" height="70" width="90" alt="...">
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="card-body p-1 lh-1 text-center">
                                                            <h6 class="card-title text-white lh-1"><?= $result->email ?></h6>
                                                            <b class="apodo text-white"><?= $result->nickname ?></b>
                                                            <p class="card-text text-end"><small class="text-muted"><?= $result->status ?></small></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a class="text-decoration-none" href="<?= baseUrl ?>Clients/myProfile&id=<?= $result->Clients_id ?>">
                                    </div>
                                <?php endwhile; ?>
                            </div>

                            <div class="py-2 px-4">
                                <h2 class="text-title lh-1">CLASIFICACION GANADOR <i class="bi bi-trophy"></i></h2>
                            </div>
                            <?php $idEvent = $seeEvent->idevent ?>
                            <?php $participant = utilities::classificationWinner($idEvent); ?>
                            <div class="row justify-content-center">
                                <?php while ($result = $participant->fetch_object()) : ?>
                                    <div class="col-sm-12 col-md-4 col-lg-3 col-xs-3">
                                        <a class="text-decoration-none" href="<?= baseUrl ?>Clients/myProfile&id=<?= $result->Clients_id ?>">
                                            <div class="card border-section mb-3 border-0" style="background: rgb(0, 0, 0, .9);">
                                                <div class="row g-0">
                                                    <div class="col-3">
                                                        <img src="<?= baseUrl ?>Uploads/profiles/<?= $result->image ?>" class="rounded-start p-0 border-0" height="70" width="90" alt="...">
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="card-body p-1 lh-1 text-center">
                                                            <h6 class="card-title text-white lh-1"><?= $result->email ?></h6>
                                                            <b class="apodo text-white"><?= $result->nickname ?></b>
                                                            <p class="card-text text-end"><small class="text-muted"><?= $result->status ?></small></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif ?>
<?php require_once('view/layout/Footer1.php'); ?>