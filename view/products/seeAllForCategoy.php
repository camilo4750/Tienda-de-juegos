<?php require_once('View/layout/Header1.php'); ?>
<section>
    <div class="container-fluid">
        <div class="row">
            <?php if (isset($_SESSION['User'])) : ?>
                <div class="col-sm-12 col-md-12 col-lg-2">
                    <div class="card shadow mt-7 sticky-lg-top">
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
                    <div class="col-sm-12 col-md-12 col-lg-12">
                    <?php endif; ?>
                    <div class="card mt-7 shadow bg-light">
                        <div class="card-body">
                            <h2 class="text-title text-center"> <?= $nameCategory->name ?> </h2>
                            <hr>
                            <div class="row mb-4">
                                <?php while ($PRODUCT = $allProducts->fetch_object()) : ?>
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
        </div>
    </div>
</section>
<?php require_once('view/layout/Footer1.php'); ?>