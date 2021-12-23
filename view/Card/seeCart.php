<?php require_once('View/layout/Header1.php'); ?>

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
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Unidades</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($cart as $indice => $element) :
                                $product = $element['product'];
                            ?>
                                <tr class="text-description">
                                    <th scope="row"><?= $indice ?></th>
                                    <td><img src="<?= baseUrl ?>Uploads/products/<?= $product->image ?>" height="100" width="80" alt=""></td>
                                    <td><a href="<?= baseUrl ?>Products/seeProduct&id=<?= $product->idproduct ?>" class=""><?= $product->name ?></a></td>
                                    <td><?= $product->price ?></td>
                                    <td><?= $element['units'] ?></td>
                                    <td>@mdo</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('view/layout/Footer1.php'); ?>