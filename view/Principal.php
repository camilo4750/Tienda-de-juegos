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
<section class="bg-light">
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
<div class="container-fluid">
    <div class="row">
        <div class="py-4 px-5">
            <h2 class="text-title ">NUESTROS PRODUCTOS</h2>
            <p class="text-primary">"No te quedes con las ganas de obtener el tuyo"</p>
        </div>
        <?php if (isset($_SESSION['User'])) : ?>
            <div class="col-md-2">
                <div class="card border-secondary">
                    <h5 class="text-center">Bienvenido: <?= $_SESSION['User']->name ?></h5>
                    <div class="card p-3">
                        <a href="#" class="btn btn-fixed p-0">Productos</a>
                        <a href="#" class="btn btn-b mt-1 p-0">Total:</a>
                        <a href="#" class="btn btn-a mt-1 p-0">Ver Carrito</a>
                        <a href="<?= baseUrl ?>Clients/logout" class="btn btn-c p-0 mt-1">Cerrar Session</a>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
            <?php else : ?>
                <div class="col-md-12">
                <?php endif; ?>
                <div class="row mb-4">
                    <?php $PRODUCTS = utilities::allProducts(); ?>
                    <?php while ($PRODUCT = $PRODUCTS->fetch_object()) : ?>
                        <div class="col-xl-3 col-md-6">
                            <div class="card shadow border-secondary border-3  p-2 mb-2 justify-content-center align-items-center">
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
                                        <a class="btn btn-b" href="#">Comprar »</a>
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

<div class="container-fluid p-0">
    <div class="card border-0 bg-dark text-white">
        <?php $EVENTS = utilities::allEvent(); ?>
        <?php while ($EVENT = $EVENTS->fetch_object()) : ?>
            <img src="<?= baseUrl ?>Uploads/events/<?= $EVENT->image ?>" class="card-img" height="550" width="100" alt="...">
            <div class="fondo">
                <div class="card-img-overlay mt-5">
                    <h5 class="card-title text-title text-white"><?= $EVENT->name ?></h5>
                    <p class="card-text text-primary2"><?= $EVENT->description ?></p>
                    <p class="card-text text-primary2">Fecha Inicio De Inscripciones: <?= $EVENT->create_at ?> Fecha Fin De Inscripcion: <?= $EVENT->expires_in ?></p>
                    <?php if (isset($_SESSION['User'])) : ?>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            CLICK PARA REGISTRARTE EN ESTE EVENTO
                        </button>

                        <!-- Modal -->
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
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<div class="container-fluid">
    <?php $TIDINGS = utilities::allTidings(); ?>
    <div class="row bg-light">
        <div class="py-4 px-5">
            <h2 class="text-title ">NOTICIAS DE ULTIMA HORA</h2>
            <p class="text-primary">"Conoce todo lo que sucede en el mundo de los videojuegos no te quedes sin ninguna novedad..!"</p>
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
<?php require_once('view/layout/Footer1.php'); ?>