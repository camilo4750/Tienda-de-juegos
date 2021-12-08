<?php require_once('view/layout/Header2.php') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= baseUrl ?>Products/create">Crear</a></li>
                    <li class="breadcrumb-item"><a href="<?= baseUrl ?>Products/view">Ver Tabla</a></li>

                </ol>
            </nav>
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">PREVISUALIZACIÓN PRODUCTO N°<?= $PRODUCT->idproduct ?></h6>
                </div>
                <div class="card-body">
                    <div class="container p-1">
                        <div class="row">
                            <div class="col-lg-8">
                                <?php if (isset($PRODUCT) && is_object($PRODUCT)) : ?>
                                    <table class="table table-striped table-bordered table-responsive-sm">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">CAMPO</th>
                                                <th scope="col">DESCRIPCION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">ID</th>
                                                <td><?= $PRODUCT->idproduct ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">DESCRIPCION</th>
                                                <td><?= $PRODUCT->description ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">PRECIO</th>
                                                <td>$<?= $PRODUCT->price ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">DESCUENTO</th>
                                                <td><?= $PRODUCT->discount ?>%</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">CREADO</th>
                                                <td><?= $PRODUCT->create_at ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">ESTADO</th>
                                                <td><?= $PRODUCT->status ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row">CATEGORIA</th>
                                                <td><?= $PRODUCT->category ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </div>
                            <div class="col-lg-4">
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
                                    <div class="ml-auto">
                                        <a href="<?= baseUrl ?>Products/viewProduct&id=<?= $PRODUCT->idproduct ?>" class="btn btn-fixed" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">ver »</a>
                                        <a class="btn btn-b" href="#">Comprar »</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once('view/layout/Footer2.php') ?>