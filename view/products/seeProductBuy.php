<?php require_once('View/layout/Header1.php'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="card mt-7 p-4 mb-4 border-color-blue bg-light border-0">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="envase mt-lg-5 mt-md-5">
                        <img src="<?= baseUrl ?>Uploads/products/<?= $seeProduct->image ?>" class="shadow " height="50%" width="50%" alt="">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="text-center">
                        <h3 class="text-title lh-1 mt-4"><?= $seeProduct->name ?> <br> <b class="fs-4 text-dark">Distibución: <?= $seeProduct->creator ?></b></h3>
                    </div>
                    <div class="row">
                        <h3 class="text-title fs-4 ms-4">Especificaciones</h3>
                        <div class="col-sm-6 col-md-6">
                            <ul>
                                <li class="text-options"> <b>Lenguaje:</b> <?= $seeProduct->language ?></li>
                                <li class="text-options"> <b>Formato:</b> <?= $seeProduct->format ?></li>
                                <li class="text-options"> <b>Voces:</b> <?= $seeProduct->voices ?></li>
                                <li class="text-options"> <b>Online:</b> <?= $seeProduct->online ?></li>
                            </ul>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <ul>
                                <li class="text-options"> <b>Unidades disponibles:</b> <?= $seeProduct->stock ?></li>
                                <li class="text-options">
                                    <b>Categoria:</b> <a href="<?= baseUrl ?>Products/allCategory&id=<?= $seeProduct->idcategory ?>"> <?= $seeProduct->category ?></a>
                                </li>
                                <li class="text-options"> <b>Precio:</b> $<?= number_format($seeProduct->price) ?></li>
                                <li class="text-options"> <b>Descuento:</b> <?= $seeProduct->discount ?>%</li>
                            </ul>
                        </div>
                    </div>
                    <div class="container">
                        <h3 class="text-title fs-4">Requisitos minimos</h3>
                        <p class="text-description fs-6"><?= $seeProduct->requirements ?></p>
                        <h3 class="text-title fs-4">Descripcion</h3>
                        <p class="text-description fs-6"><?= $seeProduct->description ?></p>
                        <div class="d-grid gap-2">
                            <?php if (isset($_SESSION['User'])) : ?>
                                <?php if ($seeProduct->stock === '0') : ?>
                                    <a class="btn btn-b disabled" href="<?= baseUrl ?>Cart/addToCart&id=<?= $seeProduct->idproduct ?>">Agregar producto al corrito<i class="bi bi-cart-plus-fill"></i></a>
                                <?php else : ?>
                                    <a class="btn btn-b" href="<?= baseUrl ?>Cart/addToCart&id=<?= $seeProduct->idproduct ?>">Agregar producto al corrito<i class="bi bi-cart-plus-fill"></i></a>
                                <?php endif; ?>
                            <?php else : ?>
                                <a class="btn btn-b " onclick="alert('Debes iniciar Session...!');" href="#">Agregar producto al carrito <i class="bi bi-cart-plus-fill"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <p class="card-text ms-auto"><small class="text-muted">Ultima actualizacion el <?= $seeProduct->create_at ?></small></p>
        </div>
    </div>
</div>

<section class="bg-light">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="py-4 px-5 mt-5">
                <h2 class="text-title ">MAS DE NUESTROS PRODUCTOS</h2>
            </div>
            <?php if (isset($_SESSION['User'])) : ?>
                <div class="col-sm-12 col-md-12 col-lg-2">
                    <div class="card shadow">
                        <h5 class="text-center">Bienvenido: <?= $_SESSION['User']->name . $_SESSION['User']->idclient ?></h5>
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
                                        <td><?= number_format($stats['priceTotal']) ?></td>
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
                    <div class="row justify-content-center mb-4 p-3">
                        <?php $PRODUCTS = utilities::allProducts(); ?>
                        <?php while ($PRODUCT = $PRODUCTS->fetch_object()) : ?>
                            <?php if ($PRODUCT->status == 'Activo') : ?>
                                <div class="col-sm-9 col-xl-3 col-md-6 ">
                                    <div class="card shadow p-2 mb-2 justify-content-center align-items-center border-product" style="height: 450px;">
                                        <div>
                                            <img src="<?= baseUrl ?>Uploads/products/<?= $PRODUCT->image ?>" class="bd-placeholder-img rounded shadow" width="120" height="170" alt="">
                                        </div>
                                        <h3 class="lh-1 mt-1 text-center"><?= $PRODUCT->name ?></h3>
                                        <div class="text-center">
                                            <h5 class="text-warning">$<?= number_format($PRODUCT->price) ?></h5>
                                            <h6>Disponibles: <?= $PRODUCT->stock ?> - Descuento: <?= $PRODUCT->discount ?>%</h6>
                                        </div>
                                        <p><?= $PRODUCT->descriptionCor ?>...</p>
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
                            <?php endif ?>
                        <?php endwhile; ?>
                    </div>
                    </div>
                </div>
        </div>
    </div>
    <section>
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

                        <?php endif; ?>
                        <?php while ($comment = $COMMENTS->fetch_object()) : ?>
                            <?php if ($seeProduct->idproduct = $comment->Products_id) : ?>
                                <div class="row">
                                    <div class="col-1">
                                        <div style="height: 100%; width: 100%;">
                                            <img src="<?= baseUrl ?>Uploads/profiles/<?= $comment->image ?>" class="py-2 img-fluid mx-2 rounded-circle" alt="">
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <h5 class=" fw-bold"><?= isset($comment) && is_object($comment) ? $comment->name : '' ?> <?= isset($comment) && is_object($comment) ? $comment->surname : '' ?> -
                                            <span class="fw-normal fs-6">creado: <?= isset($comment) && is_object($comment) ? $comment->create_at : '' ?></span>
                                        </h5>
                                        <p>- <?= isset($comment) && is_object($comment) ? $comment->comment : '' ?></p>
                                        <div class="collapse" id="collapseExample<?= $comment->idcomment ?>">
                                            <div class="p-1">
                                                <form action="<?= baseUrl ?>Comments/save&id=<?= $comment->idcomment ?>" method="POST">
                                                    <div class="input-group mb-3 mt-3">
                                                        <?php if (isset($_SESSION['User']) && $_SESSION['User']->idclient === $comment->Clients_id) : ?>
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
                                    <div class="col-2">
                                        <?php if (isset($_SESSION['User']) && $_SESSION['User']->idclient === $comment->Clients_id) : ?>


                                            <div class="mt-3">
                                                <button class="btn btn-a btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample<?= $comment->idcomment ?>" aria-expanded="false" aria-controls="collapseExample">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                                <a href="<?= baseUrl ?>Comments/delete&id=<?= $comment->idcomment ?>&product=<?= $comment->Products_id ?>" class="btn btn-c btn-sm" type="submit" id="button-addon2"><i class="bi bi-x-octagon"></i></a>
                                            </div>

                                        <?php endif;  ?>
                                    </div>

                                </div>
                                <hr>
                            <?php endif;  ?>
                        <?php endwhile; ?>
                        </div>
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
    </section>
    <?php require_once('view/layout/Footer1.php'); ?>