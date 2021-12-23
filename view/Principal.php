<?php require_once('View/layout/Header1.php'); ?>
<div class="envase">
    <figure>
        <img src="<?= baseUrl ?>assets/img/consols.jpg" alt="compumedica servicios">
        <div class="texto">
            <h2>Compra Tus Juegos Favoritos Y Participa En Nuestros Eventos Gamer No Esperes Mas
            </h2>
            <i class="bi bi-arrow-down"></i>
        </div>
    </figure>
</div>

<section class="bg-light effect1">
    <div class="container">
        <div class="row m-0 mt-4">
            <div class="col-xl-3 col-md-6 mb-3">
                <div class="card border-section">
                    <div class="card-body text-center">
                        <i class="bi bi-card-checklist icons1"></i>
                        <h5 class="text-color1">Pedidos Online</h5>
                        <p class="card-text mb-4">
                            Crea tu perfil y realiza compras con envios a todo el pais y
                            garantia de 1 mes dias en todos nuestros productos
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-3">
                <div class="card border-section">
                    <div class="card-body text-center">
                        <i class="bi bi-cart-check-fill icons1"></i>
                        <h5 class="text-color1">Envios al instante</h5>
                        <p class="card-text">
                            Al mometo en que realizas la compra, imediatamente Quick Shopping
                            se toma la responsabilidad enviar tu producto al instante
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-3">
                <div class="card border-section">
                    <div class="card-body text-center">
                        <i class="bi bi-credit-card-fill icons1"></i>
                        <h5 class="text-color1">Pagos en linea</h5>
                        <div class="card-text">
                            en Quick Shopping tienes la posibilidad de realizar tus
                            compras online y al instante o realiza tu pago en puntos
                            autorizados
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-3">
                <div class="card border-section">
                    <div class="card-body text-center">
                        <i class="bi bi-lock-fill icons1"></i>
                        <h5 class="text-color1">Seguridad</h5>
                        <div class="card-text mb-4 ">
                            Nos encargamos de que tus datos esten 100% protegidos y tus compras seguras siempre con la mejor calidad
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="effect1">
    <div class="container-fluid">
        <div class="row">
            <div class="py-4 px-4">
                <h2 class="text-title lh-1">NUESTROS PRODUCTOS</h2>
                <p class="text-primary lh-1">"No te quedes con las ganas de obtener el tuyo"</p>
            </div>
            <?php if (isset($_SESSION['User'])) : ?>
                <div class="col-sm-12 col-md-12 col-lg-2">
                    <div class="card shadow">
                        <h5 class="text-center">Bienvenido: <?= $_SESSION['User']->name ?></h5>
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
                <div class="col-sm-12 col-md-12 col-lg-10">
                <?php else : ?>
                    <div class="col-sm-12 col-md-12 col-lg-10">
                    <?php endif; ?>
                    <div class="row mb-4">
                        <?php $PRODUCTS = utilities::allProducts(); ?>
                        <?php while ($PRODUCT = $PRODUCTS->fetch_object()) : ?>
                            <div class="col-xl-3 col-md-6">
                                <div class="card shadow border-0 p-2 mb-2 justify-content-center align-items-center">
                                    <div>
                                        <img src="<?= baseUrl ?>Uploads/products/<?= $PRODUCT->image ?>" class="bd-placeholder-img rounded shadow" width="120" height="140" alt="">
                                    </div>
                                    <h2><?= $PRODUCT->name ?></h2>
                                    <div class="text-center">
                                        <h5 class="text-warning">$<?= $PRODUCT->price ?></h5>
                                        <h6>Disponibles: <?= $PRODUCT->stock ?> - Descuento: <?= $PRODUCT->discount ?>%</h6>
                                    </div>
                                    <p><?= $PRODUCT->descriptionCor ?></p>
                                    <div class="ms-auto">
                                        <a href="<?= baseUrl ?>Products/seeProduct&id=<?= $PRODUCT->idproduct ?>" class="btn btn-fixed" type="button">ver »</a>
                                        <?php if (isset($_SESSION['User'])) : ?>
                                            <a class="btn btn-b" href="<?= baseUrl ?>Cart/addToCart&id=<?= $PRODUCT->idproduct ?>">Comprar »</a>
                                        <?php else : ?>
                                            <a class="btn btn-b " onclick="alert('Debes iniciar Session...!');" href="#">Comprar »</a>
                                        <?php endif; ?>
                                    </div>

                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    </div>
                </div>
        </div>
    </div>
</section>

<section class="bg-light effect1">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="py-4 px-4">
                <h2 class="text-title lh-1">TORNEOS EN DESARROLLO</h2>
                <p class="text-primary lh-1">"Quieres demostrar tus excelentes habilidades como gamer, inscribete..!"</p>
            </div>
            <?php $ongoing = utilities::ongoingEvents(); ?>
            <?php while ($currentEvent = $ongoing->fetch_object()) : ?>
                <div class="col-sm-12 col-md-6 col-lg-4 col-xxl-3 ml-auto">
                    <a href="<?= baseUrl ?>Events/seeEvent&id=<?= $currentEvent->idevent ?>">
                        <div class="card bg-dark rounded text-white  border-events">
                            <img src="<?= baseUrl ?>Uploads/events/<?= $currentEvent->image ?>" class="card-img" alt="..." height="240">
                            <div class="card-img-overlay fondImage p-2">
                                <h3 class="card-title lh-1"><?= $currentEvent->name ?></h3>
                                <div>
                                    <span class="fw-bold">FIN DE INSCRIPCIÓN</span> <br>
                                    <p class="card-text"> <?= $currentEvent->expires_in ?> </p>
                                </div>
                                <div>
                                    <span class="fw-bold">INICIO</span> <br>
                                    <p class="card-text"> <?= $currentEvent->create_at ?> </p>
                                </div>
                                <div>
                                    <span class="fw-bold">MAXIMO DE PARTICIPANTES</span> <br>
                                    <p class="card-text"> <?= $currentEvent->numberParticipants . " " . $currentEvent->type ?> </p>
                                </div>
                                <div class="row">
                                    <div class="col-auto me-auto"> <span class="fw-bold">INSCRITOS HASTA LA FECHA</span> <br>
                                        <?php $idEvent = $currentEvent->idevent ?>
                                        <?php $countParticipants = utilities::countParticipants($idEvent); ?>
                                        <p class="card-text"> <?= isset($countParticipants) && is_object($countParticipants) ? $countParticipants->total . " " . $currentEvent->type : "" ?> </p>
                                    </div>
                                    <div class="col-auto">
                                        <?php if ($currentEvent->finalized == 'Si') : ?>
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
        </div>
    </div>

    <div class="container-fluid ">
        <div class="row">
            <div class="py-4 px-4">
                <h2 class="text-title lh-1">TORNEOS FINALIZADOS</h2>
                <p class="text-primary lh-1">"hecha un vistaso de como fue el proceso y sus ganadores"</p>
            </div>
            <?php $completed = utilities::completedEvents() ?>
            <?php while ($eventFinalized = $completed->fetch_object()) : ?>

                <div class="col-sm-12 col-md-6 col-lg-4 col-xxl-3 ml-auto">
                    <a href="<?= baseUrl ?>Events/seeEvent&id=<?= $eventFinalized->idevent ?>">
                        <div class="card bg-dark rounded text-white border-events mb-3">
                            <img src="<?= baseUrl ?>Uploads/events/<?= $eventFinalized->image ?>" class="card-img" alt="..." height="240">
                            <div class="card-img-overlay fondImage p-2">
                                <h4 class="card-title lh-1"><?= $eventFinalized->name ?></h3>
                                    <div>
                                        <span class="fw-bold">FIN DE INSCRIPCIÓN</span> <br>
                                        <p class="card-text"> <?= $eventFinalized->expires_in ?> </p>
                                    </div>
                                    <div>
                                        <span class="fw-bold">INICIO</span> <br>
                                        <p class="card-text"> <?= $eventFinalized->create_at ?> </p>
                                    </div>
                                    <div>
                                        <span class="fw-bold">MAXIMO DE PARTICIPANTES</span> <br>
                                        <p class="card-text"> <?= $eventFinalized->numberParticipants . " " . $eventFinalized->type ?> </p>
                                    </div>
                                    <div class="row">
                                        <div class="col-auto me-auto"> <span class="fw-bold">INSCRITOS HASTA LA FECHA</span> <br>
                                            <?php if (isset($countParticipants)) : ?>
                                                <?php $idEvent = $eventFinalized->idevent ?>
                                                <?php $countParticipants = utilities::countParticipants($idEvent); ?>
                                                <p class="card-text"> <?= isset($countParticipants) && is_object($countParticipants) ? $countParticipants->total . " " . $eventFinalized->type : "" ?> </p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-auto">
                                            <?php if ($eventFinalized->finalized == 'Si') : ?>
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
        </div>
    </div>
</section>

<section>
    <div class="container-fluid">
        <div class="row">
            <div class="image3 p-0">
                <div class="fondImage2">
                    <ul class="normas">
                        <h1>NORMAS PRINCIPALES</h1>
                        <li class="fs-5 ">1. Los jugadores deberan contar con alguno de estos dispositivos para poder participar (XBOX, PLAYSTATION , CELULAR, PC, TABLED) </li>
                        <li class="fs-5">2. deberan contar con una edad mayor a los 18 años</li>
                        <li class="fs-5">3. Rcuerden tener en cuenta la region del servidor</li>
                        <li class="fs-5">4. registrate con anticipacion, al llenarce los cupos ya no podras participar</li>
                        <li class="fs-5">5. si tienes dudas o preguntas puedes escribirnos al correo quickshopping@gmail.com</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="effect1">
    <div class="container-fluid">
        <?php $TIDINGS = utilities::allTidings(); ?>
        <div class="row bg-light">
            <div class="py-4 px-4">
                <h2 class="text-title lh-1">NOTICIAS DE ULTIMA HORA</h2>
                <p class="text-primary lh-1">"Conoce todo lo que sucede en el mundo de los videojuegos no te quedes sin ninguna novedad..!"</p>
            </div>

            <?php while ($TIDING = $TIDINGS->fetch_object()) : ?>
                <div class="col-xl-6 col-md-12">
                    <div class="card mb-3 shadow">
                        <div class="row g-0">
                            <div class="col-md-5">
                                <img src="<?= baseUrl ?>uploads/Tidings/<?= $TIDING->image ?>" class="img-fluid rounded-start p-0" alt="...">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $TIDING->name ?></h5>
                                    <p class="card-text"><?= $TIDING->description ?></p>
                                    <p class="card-text"><small class="text-muted">Ultima actializacion: <?= $TIDING->create_at ?></small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php require_once('view/layout/Footer1.php'); ?>