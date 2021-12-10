<?php require_once('View/layout/Header1.php'); ?>
<div class="container">
    <div class="card mt-7 p-4 border-color-blue border-0">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="container">
                    <div class="envase">
                        <img src="<?= baseUrl ?>Uploads/products/<?= $seeProduct->image ?>" class="shadow mx-auto imageProduct" alt="">

                    </div>

                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="container text-center">
                    <h3 class="text-title"><?= $seeProduct->name ?></h3>
                    <ul>
                        <li class="text-options">
                            <a href="" class="text-options btn btn-fixed"><?= $seeProduct->category ?></a>
                        </li>
                        <li class="text-options">Precio: $<?= $seeProduct->price ?></li>
                        <li class="text-options">Unidades disponibles: <?= $seeProduct->stock ?></li>
                        <li class="text-options">Descuento: <?= $seeProduct->discount ?>%</li>
                        <li class="text-options">
                            <?php if (isset($_SESSION['User'])) : ?>
                                <a class="btn btn-b" href="#">Comprar »</a>
                            <?php else : ?>
                                <a class="btn btn-b" onclick="alert('Debes iniciar Session...!');" href="#">Comprar »</a>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="container text-center">
                    <h3 class="text-title">Descripcion</h3>
                    <p class="text-description"><?= $seeProduct->description ?></p>
                </div>
            </div>
        </div>
        <p class="card-text ms-auto"><small class="text-muted">Ultima actualizacion el <?= $seeProduct->create_at ?></small></p>

    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="py-4 px-5 mt-5">
            <h2 class="text-title ">MAS DE NUESTROS PRODUCTOS</h2>
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
<section>
    <div class="container">
        <hr>
        <div class="row">
            <div class="card border-0">
                <h2 class="text-title ">COMENTARIOS (89)</h2>
                <form action="<?= baseUrl ?>" method="POST">
                    <div class="input-group mb-3">
                        <input type="hidden" name="type" value="1">
                        <input type="hidden" name="c_prod_0" value="1">
                        <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <button class="btn btn-outline-success" type="button" id="button-addon2"><i class="bi bi-send-plus"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


<?php require_once('view/layout/Footer1.php'); ?>