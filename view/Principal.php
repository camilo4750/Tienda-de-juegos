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
<div class="container-fluid">
    <div class="row">
        <?php if (isset($_SESSION['User'])) : ?>
            <div class="col-md-2">
                <div class="card border-info">
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
                <div class="card p-3">
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card mb-2 justify-content-center align-items-center">
                                <div>
                                    <img src="<?= baseUrl ?>assets/img/consols.jpg" class="bd-placeholder-img rounded-circle" width="140" height="140" alt="">
                                </div>
                                <h2>Heading</h2>
                                <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
                                <p class=""><a class="btn btn-secondary" href="#">View details »</a></p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 ">
                            <div class="card mb-2 justify-content-center align-items-center">
                                <div>
                                    <img src="<?= baseUrl ?>assets/img/consols.jpg" class="bd-placeholder-img rounded-circle" width="140" height="140" alt="">
                                </div>
                                <h2>Heading</h2>
                                <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
                                <p><a class="btn btn-secondary" href="#">View details »</a></p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 ">
                            <div class="card mb-2 justify-content-center align-items-center">
                                <div>
                                    <img src="<?= baseUrl ?>assets/img/consols.jpg" class="bd-placeholder-img rounded-circle" width="140" height="140" alt="">
                                </div>
                                <h2>Heading</h2>
                                <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
                                <p><a class="btn btn-secondary" href="#">View details »</a></p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 ">
                            <div class="card justify-content-center align-items-center">
                                <div>
                                    <img src="<?= baseUrl ?>assets/img/consols.jpg" class="bd-placeholder-img rounded-circle" width="140" height="140" alt="">
                                </div>
                                <h2>Heading</h2>
                                <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
                                <p><a class="btn btn-secondary" href="#">View details »</a></p>
                            </div>
                        </div>
                    </div><!-- /.row -->
                </div>
                </div>
            </div>
    </div>
</div>
<?php require_once('view/layout/Footer1.php'); ?>