<?php require_once('View/layout/Header1.php'); ?>
<?php if (isset($_SESSION['User']) && $_SESSION['User']->idclient === $_SESSION['User']->idclient) : ?>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card mt-7">
                    <div class="card-header">
                        <h2 class="text-title text-center">LISTADO DE PRODUCTOS</h2>
                    </div>
                    <div class="card-body">
                        <?php if (isset($_SESSION['listDelete']) && $_SESSION['listDelete'] = "Exitoso") : ?>
                            <div class="row" id="mydiv">
                                <div class="col-md-12 ">
                                    <div class=" text-center alert alert-info alert-dismissible fade show" role="alert">
                                        <strong> <i class="bi bi-list-check"></i> Tu lista de productos del corrito, se han eliminado exitosamente..!</strong>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php utilities::deleteSession(); ?>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <?php $stats = utilities::statsCart(); ?>
                            <caption class="fs-4 ms-5 mt-2 fw-bolder text-dark">
                                UNIDADES: <?= $stats['countProducts'] ?> <br>
                                VALOR TOTAL: $<?= $stats['priceTotal'] ?>
                            </caption>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Producto</th>
                                    <th scope="col">Unidades</th>
                                    <th scope="col">Precios</th>
                                    <th scope="col">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if ($cart == null) : ?>
                                    <td colspan="6" class="fw-bold text-center text-danger fs-4">Aun no tienes productos en tu carrito</td>
                                <?php else : ?>
                                    <?php
                                    foreach ($cart as $indice => $element) :
                                        $product = $element['product'];
                                    ?>
                                        <tr class="text-description">
                                            <th scope="row"><?= $indice ?></th>
                                            <td><img src="<?= baseUrl ?>Uploads/products/<?= $product->image ?>" height="100" width="80" alt=""></td>
                                            <td><a href="<?= baseUrl ?>Products/seeProduct&id=<?= $product->idproduct ?>" class=""><?= $product->name ?></a></td>
                                            <td><?= $element['units'] ?></td>
                                            <td><?= $product->price * $element['units'] ?></td>
                                            <td>@mdo</td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <?php if ($cart == null) : ?>
                        <div class="d-grid gap-2 mx-5 mb-4">
                            <button onclick="alert('Debes tener productos en tu carro de compras..!')" class="btn btn-b">REALIZAR COMPRA</button>
                        </div>
                    <?php else : ?>
                        <div class="d-grid gap-2 mx-5 mb-4">
                            <a href="<?= baseUrl ?>Cart/PerformBuy" class="btn btn-b">REALIZAR COMPRA</a>
                            <a href="<?= baseUrl ?>Cart/deleteAllCart" class="btn btn-a">BORRAR PRODUCTOS DEL CARRITO</a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php require_once('view/layout/Footer1.php'); ?>