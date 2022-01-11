<?php require_once('View/layout/Header1.php'); ?>
<?php if (isset($Client) && is_object($Client)) : ?>

    <section class="bg-light">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <?php if (isset($_SESSION['User']) && $_SESSION['User']->idclient === $Client->idclient) : ?>
                    <div class="col-sm-12 col-md-12 col-lg-2">
                        <div class="card mt-7 shadow">
                            <div class="card border-0 p-1">
                                <a href="<?= baseUrl ?>Clients/myProfile&id=<?= $_SESSION['User']->idclient ?>" class="btn fs-6 btn-fixed p-0">MI PERFIL</a>
                                <a href="<?= baseUrl ?>Clients/logout" class="btn btn-c fs-6 p-0 mt-1">CERRAR SESSION</a>
                                <a href="<?= baseUrl ?>Cart/listProducts" class="btn btn-a mt-1 fs-6 p-0">VER CARRITO</a>
                                <?php $stats = utilities::statsCart(); ?>
                                <table class="table table-hover table-bordered mt-1">
                                    <thead>
                                        <tr>
                                            <th scope="col">Productos</th>
                                            <th scope="col">Precio</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><?= $stats['countProducts'] ?></th>
                                            <td><?= $stats['priceTotal'] ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="col-sm-12 col-md-12 col-lg-10">
                    <div class="card mt-7 mb-4  p-3 rounded-3 border-0 shadow">
                        <div class="container">
                            <div class="row">
                                <?php if (isset($_SESSION['edit']) && $_SESSION['edit'] = "error1") : ?>
                                    <div class="row" id="mydiv">
                                        <div class="col-md-12">
                                            <div class=" alert alert-warning alert-dismissible fade show" role="alert">
                                                <strong><i class="bi bi-person-x-fill"></i></strong> Los datos se actualizaron correctamente
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php utilities::deleteSession(); ?>
                                <div class="col-sm-12 col-lg-2">
                                    <div class="d-flex align-items-center">
                                        <div class="image">
                                            <img src="<?= baseUrl ?>Uploads/profiles/<?= $Client->image ?>" class="ms-3 rounded-3" width="135" height="135">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-10 p-0">
                                    <div class="d-flex align-items-center mt-2">
                                        <div class="w-100">
                                            <h4 class="mb-0 mt-0">
                                                <?= $Client->name . " " .  $Client->surname ?> - <?= $Client->email ?>
                                            </h4>
                                            <span><?= $Client->description  ?></span> - <span class="apodo fs-5"><?= $Client->nickname  ?></span>
                                            <div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">
                                                <div class="d-flex flex-column"> <span class="rating">ID</span> <span class="number3"><?= $Client->idclient ?></span> </div>
                                                <div class="d-flex flex-column"> <span class="articles">creado:</span> <span class="number1"><?= $Client->create_at ?></span> </div>
                                                <div class="d-flex flex-column"> <span class="followers">Cliente fijo:</span> <span class="number2"><?= $Client->client_fixed ?></span> </div>
                                                <div class="d-flex flex-column"> <span class="followers">Editar datos:</span>
                                                    <?php if (isset($_SESSION['User']) && $_SESSION['User']->idclient === $Client->idclient) : ?>
                                                        <button type="button" class="btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </button>
                                                    <?php endif; ?>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Editar mis datos</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= baseUrl ?>Clients/save&id=<?= $Client->idclient  ?>" method="POST" enctype="multipart/form-data">
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" required name="name" value="<?= $Client->name ?>">
                                                        <label for="floatingInput">Nombres</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" required name="surname" value="<?= $Client->surname ?>">
                                                        <label for="floatingInput">Apellidos</label>
                                                    </div>

                                                    <label for="">Foto perfil:</label>
                                                    <div class="form-control mb-3">
                                                        <input type="file" class="form-control" name="image">
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" required name="description" value="<?= $Client->description ?>">
                                                        <label for="floatingInput">Descripcion</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="email" class="form-control" required name="email" value="<?= $Client->email ?>">
                                                        <label for="floatingInput">Email</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" required name="nickname" value="<?= $Client->nickname ?>">
                                                        <label for="floatingInput">Apodo</label>
                                                    </div>
                                                    <div class="d-grid gap-2">
                                                        <button class="btn btn-warning mt-3" type="submit">Actualizar informacion</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-light">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="py-3 px-4">
                    <h2 class="text-title lh-1">MI LISTA DE TORNEOS</h2>
                </div>
                <?php if (isset($countEvents) && $countEvents->total == 0) : ?>
                    <h2 class="text-dark ms-5">- Aun no participas en ningun evento.</h2>
                <?php else : ?>
                    <?php $idClient = $Client->idclient ?>
                    <?php $Events = utilities::EventsForClients($idClient); ?>
                    <?php while ($Event = $Events->fetch_object()) : ?>
                        <div class="col-sm-12 col-md-7 col-lg-5 col-xl-4">
                            <a href="<?= baseUrl ?>Events/seeEvent&id=<?= $Event->idevent ?>">
                                <div class="card bg-dark rounded text-white mb-3 border-events">
                                    <img src="<?= baseUrl ?>Uploads/events/<?= $Event->image ?>" class="card-img" alt="..." height="240">
                                    <div class="card-img-overlay fondImage p-2">
                                        <h3 class="card-title lh-1"><?= $Event->name ?></h3>
                                        <div>
                                            <span class="fw-bold">FIN DE INSCRIPCIÓN</span> <br>
                                            <p class="card-text"> <?= $Event->expires_in ?> </p>
                                        </div>
                                        <div>
                                            <span class="fw-bold">INICIO</span> <br>
                                            <p class="card-text"> <?= $Event->create_at ?> </p>
                                        </div>
                                        <div>
                                            <span class="fw-bold">MAXIMO DE PARTICIPANTES</span> <br>
                                            <p class="card-text"> <?= $Event->numberParticipants . " " . $Event->type ?> </p>
                                        </div>
                                        <div class="row">
                                            <div class="col-auto me-auto"> <span class="fw-bold">INSCRITOS HASTA LA FECHA</span> <br>
                                                <?php $idEvent = $Event->idevent ?>
                                                <?php $countParticipants = utilities::countParticipants($idEvent); ?>
                                                <p class="card-text"> <?= isset($countParticipants) && is_object($countParticipants) ? $countParticipants->total . " " . $Event->type : "" ?> </p>
                                            </div>
                                            <div class="col-auto">
                                                <?php if ($Event->finalized == 'Si') : ?>
                                                    <p class="text-danger fw-bold textfin">FINALIZADO</p>
                                                <?php else : ?>
                                                    <p class="text-success fw-bold textfin2">EN CURSO</p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php if (isset($_SESSION['User']) && $_SESSION['User']->idclient === $Client->idclient) : ?>
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="card border-0 bg-light">
                        <div class="py-3 px-4">
                            <h2 class="text-title lh-1">MI LISTA DE COMRAS</h2>
                        </div>
                        <div class="table-responsive mx-5">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th scope="col"># Pedido</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Solicitado</th>
                                        <th scope="col">Estado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($count) && $count->total == 0) : ?>
                                        <tr>
                                            <td colspan="4" class="fw-bold text-center text-danger fs-4">Aun no realizas ninguna compra en nuestra tienda</td>
                                        </tr>
                                    <?php else : ?>
                                        <?php while ($allOrders = $order->fetch_object()) : ?>
                                            <tr>
                                                <td><a href="<?= baseUrl ?>Cart/viewOrder&id=<?= $allOrders->idorder ?>"><strong>Ver Pedido</strong></a></td>
                                                <td>$<?= number_format($allOrders->coste) ?></td>
                                                <td><?= $allOrders->create_ad ?></td>
                                                <?php if ($allOrders->status == 'Pendiente') : ?>
                                                    <td class="text-danger fw-bold"><?= $allOrders->status ?></td>
                                                <?php elseif ($allOrders->status == 'Preparacion') : ?>
                                                    <td class="text-warning fw-bold"><?= $allOrders->status ?></td>
                                                <?php elseif ($allOrders->status == "Enviado") : ?>
                                                    <td class="text-info fw-bold"><?= $allOrders->status ?></td>
                                                <?php elseif ($allOrders->status == "Entregado") : ?>
                                                    <td class="text-success fw-bold"><?= $allOrders->status ?></td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php endif; ?>

<?php require_once('view/layout/Footer1.php'); ?>