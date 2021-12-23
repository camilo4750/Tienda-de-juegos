<?php require_once('View/layout/Header1.php'); ?>
<div class="container">
    <div class="row">
        <div class="card mt-7 p-4 mb-4 border-color-blue border-0">
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
                                    <a class="btn btn-b" href="<?= baseUrl ?>Cart/addToCart&id=<?= $seeProduct->idproduct ?>">Comprar »</a>
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
</div>
<section class="bg-light">
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
    <div class="container">
        <div class="row">
            <hr class="mb-4">
            <div class="card border-2 p-3 mb-5">
                <?php if (isset($COMMENTS) && is_object($COMMENTS) && isset($Count) && is_object($Count)) : ?>
                    <h2 class="text-title ">COMENTARIOS (<?= isset($Count) && is_object($Count) ? $Count->count : '0' ?>) </h2>
                    <div class="card border-2 p-3 py-2">
                        <?php if (isset($_SESSION['save']) && $_SESSION['save'] == "exitoso") : ?>
                            <div class="row" id="mydiv">
                                <div class="col-md-12 ">
                                    <div class=" text-center alert alert-success alert-dismissible fade show" role="alert">
                                        <strong> <i class="bi bi-chat-dots"></i> El Comentario se ha creado exitosamente..!</strong>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['edit']) && $_SESSION['edit'] == "exitoso") : ?>
                            <div class="row" id="mydiv">
                                <div class="col-md-12 ">
                                    <div class=" text-center alert alert-warning alert-dismissible fade show" role="alert">
                                        <strong>
                                            <i class="bi bi-chat-dots"></i> El Comentario se ha editado exitosamente..!
                                        </strong>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == "exitoso") : ?>
                            <div class="row" id="mydiv">
                                <div class="col-md-12 ">
                                    <div class=" text-center alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong> <i class="bi bi-chat-dots"></i> El Comentario se ha eliminado exitosamente..!</strong>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php utilities::deleteSession() ?>
                        <div class="row">
                            <?php while ($comment = $COMMENTS->fetch_object()) : ?>
                                <?php if ($seeProduct->idproduct = $comment->Products_id) : ?>
                                    <div class="col-md-2">
                                        <div class="container">
                                            <img src="<?= baseUrl ?>Uploads/profiles/<?= $comment->image ?>" height="80" width="80" class="py-2 rounded-circle ms-5" alt="">
                                        </div>
                                    </div>
                                    <div class=" col-md-10">
                                        <div class="container">
                                            <div class="card p-2 mt-1 mb-1">
                                                <h6><?= isset($comment) && is_object($comment) ? $comment->name : '' ?> <?= isset($comment) && is_object($comment) ? $comment->surname : '' ?> <i class="bi bi-person-circle"></i></h6>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-12 col-lg-9">
                                                        <div class="container">
                                                            <div class="card border-0 p-1">
                                                                - <?= isset($comment) && is_object($comment) ? $comment->comment : '' ?>
                                                                <div class="collapse" id="collapseExample<?= $comment->idcomment ?>">
                                                                    <div class="card card-body">
                                                                        <form action="<?= baseUrl ?>Comments/save&id=<?= $comment->idcomment ?>" method="POST">
                                                                            <div class="input-group mb-3 mt-3">
                                                                                <?php if (isset($_SESSION['User']) && $_SESSION['User']->idclient = $comment->Clients_id) : ?>
                                                                                    <input type="hidden" name="Products_id" value="<?= $seeProduct->idproduct ?>">
                                                                                    <input type="hidden" name="Clients_id" value="<?= $_SESSION['User']->idclient ?>">
                                                                                    <input type="text" class="form-control" name="comment" value="<?= isset($comment) && is_object($comment) ? $comment->comment : '' ?>">
                                                                                    <button class="btn btn-b" type="submit" id="button-addon2"> <i class="bi bi-pencil-square"></i></button>
                                                                                <?php endif; ?>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php if (isset($_SESSION['User']) && $_SESSION['User']->idclient = $comment->Clients_id) : ?>
                                                        <div class="col-sm-12 col-md-12 col-lg-3">
                                                            <div class="container">
                                                                <div class="ms-auto py-1">
                                                                    <button class="btn btn-a btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample<?= $comment->idcomment ?>" aria-expanded="false" aria-controls="collapseExample">
                                                                        <i class="bi bi-pencil-square"></i>
                                                                    </button>
                                                                    <a href="<?= baseUrl ?>Comments/delete&id=<?= $comment->idcomment ?>&product=<?= $comment->Products_id ?>" class="btn btn-c btn-sm" type="submit" id="button-addon2"><i class="bi bi-x-octagon"></i></a>
                                                                </div>
                                                                <small class="text-muted"><?= $seeProduct->create_at ?></small>
                                                            </div>
                                                        </div>
                                                    <?php endif;  ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <form action="<?= baseUrl ?>Comments/save" method="POST">
                    <div class="input-group mb-3 mt-3">
                        <?php if (isset($_SESSION['User'])) : ?>
                            <input type="hidden" name="Products_id" value="<?= $seeProduct->idproduct ?>">
                            <input type="hidden" name="Clients_id" value="<?= $_SESSION['User']->idclient ?>">
                        <?php endif; ?>
                        <input type="text" class="form-control" name="comment" required placeholder="Escribir comentario" aria-describedby="button-addon2">
                        <?php if (isset($_SESSION['User'])) : ?>
                            <button class="btn btn-b" type="submit" id="button-addon2"><i class="bi bi-send-plus"></i></button>
                        <?php else : ?>
                            <button class="btn btn-b" onclick="alert('Debes iniciar Session...!');" type="button" id="button-addon2"><i class="bi bi-send-plus"></i></button>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>


    <?php require_once('view/layout/Footer1.php'); ?>