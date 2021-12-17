<?php require_once('View/layout/Header1.php'); ?>
<?php if (isset($seeEvent) && is_object($seeEvent)) : ?>
    <div class="envase">
        <figure>
            <img src="<?= baseUrl ?>Uploads/events/<?= $seeEvent->image ?>" alt="compumedica servicios">
        </figure>
    </div>
    <section class="bg-light">
        <div class="container-fluid">
            <div class="row">
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
                    <div class="row">
                        <div class="py-3 px-4">
                            <h2 class="text-title lh-1">DESCRIPCION DEL EVENTO</h2>
                            <ul style="list-style-type: none;">
                                <li class="fs-4"><b>Fecha de inicio:</b> <?= $seeEvent->create_at ?></li>
                                <li class="fs-4"><b>Fecha de Fin:</b> <?= $seeEvent->expires_in ?></li>
                                <li class="fs-4"><b>Numero de participantes:</b> <?= $seeEvent->numberParticipants ?></li>
                                <li class="fs-4"><b>Metodo de juego:</b> <?= $seeEvent->type ?></li>
                                <li class="fs-4">
                                    <?php if (isset($_SESSION['User'])) : ?>
                                        <?php if ($seeEvent->finalized === "No") : ?>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-b" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                CLICK PARA REGISTRARTE EN ESTE EVENTO
                                            </button>
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
                                                            <input type="hidden" name="Events_id" value="<?= $EVENT->idevent ?>">
                                                            <input type="hidden" name="Clients_id" value="<?= isset($_SESSION['User']) ? $_SESSION['User']->idclient : "" ?>">

                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success">Registrar</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php else : ?>
                                        <a href="#" onclick="alert('Debes iniciar Session...!');" class="btn btn-success">CLICK PARA REGISTRARTE EN ESTE EVENTO</a>
                                    <?php endif; ?>
                                </li>
                            </ul>
                        </div>
                        <?php if ($seeEvent->finalized == 'Si') : ?>
                            <div class="py-2 px-4">
                                <h2 class="text-title lh-1">CLASIFICACION CUARTOS DE FINAL</h2>
                            </div>
                            <?php $idEvent = $seeEvent->idevent ?>
                            <?php $participant = utilities::classificationResult($idEvent); ?>
                            <div class="row justify-content-center">
                                <?php while ($result = $participant->fetch_object()) : ?>
                                    <div class="col-3">
                                        <div class="card mb-3" style="background: rgb(0, 0, 0, .7);">
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                    <img src="<?= baseUrl ?>Uploads/profiles/<?= $result->image ?>" class="img-fluid rounded-circle p-2 mt-2" height="100" width="100" alt="...">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body p-1">
                                                        <h6 class="card-title lh-1"><?= $result->name . " " . $result->surname ?> - <?= $result->email ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif ?>
<?php require_once('view/layout/Footer1.php'); ?>