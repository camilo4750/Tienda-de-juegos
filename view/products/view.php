<?php require_once('view/layout/Header2.php') ?>
<div class="container-fluid">
    <?php if (isset($_SESSION['save']) && $_SESSION['save'] == "exitoso") : ?>
        <div class="row" id="alerta">
            <div class="col-md-12 ">
                <div class=" text-center alert alert-success alert-dismissible fade show" role="alert">
                    <strong> <i class="bi bi-bag-plus-fill"></i> El producto se ha creado exitosamente..!</strong>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['edit']) && $_SESSION['edit'] == "exitoso") : ?>
        <div class="row" id="alerta">
            <div class="col-md-12 ">
                <div class=" text-center alert alert-warning alert-dismissible fade show" role="alert">
                    <strong> <i class="bi bi-bag-plus-fill"></i> El producto se ha editado exitosamente..!</strong>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['active']) && $_SESSION['active'] == "exitoso") : ?>
        <div class="row" id="alerta">
            <div class="col-md-12 ">
                <div class=" text-center alert alert-info alert-dismissible fade show" role="alert">
                    <strong> <i class="bi bi-bag-plus-fill"></i> El producto se ha Activado exitosamente..!</strong>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['inactive']) && $_SESSION['inactive'] == "exitoso") : ?>
        <div class="row" id="alerta">
            <div class="col-md-12 ">
                <div class=" text-center alert alert-warning alert-dismissible fade show" role="alert">
                    <strong> <i class="bi bi-bag-plus-fill"></i> El producto se ha Inacitvado exitosamente..!</strong>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php utilities::deleteSession(); ?>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= baseUrl ?>Products/create">Crear</a></li>
            <li class="breadcrumb-item"><a href="<?= baseUrl ?>Products/view">Ver Tabla</a></li>

        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">PRODUCTOS</h6>
        </div>
        <div class="card-body">

            <div class="table-responsive">
                <table id="example" class="display table responsive table-striped table-bordered" style="width:100%">
                    <thead class="bg-gradient-secondary text-white ">
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Precio Inicial</th>
                            <th>Precio Cliente</th>
                            <th>Bodega</th>
                            <th>Total</th>
                            <th>Descuento</th>
                            <th>Image</th>
                            <th>Creado</th>
                            <th>Mostrar</th>
                            <th>Categoria</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($PRODUCT = $allProducts->fetch_object()) : ?>
                            <tr>
                                <td><?= $PRODUCT->idproduct ?></td>
                                <td><?= $PRODUCT->name ?></td>
                                <td><?= $PRODUCT->descriptionCor ?></td>
                                <td>$<?= number_format($PRODUCT->price_init) ?></td>
                                <td>$<?= number_format($PRODUCT->price) ?></td>
                                <td><?= $PRODUCT->stock ?></td>
                                <td>$<?= number_format($PRODUCT->price * $PRODUCT->stock) ?></td>
                                <td><?= $PRODUCT->discount ?>%</td>
                                <td> <img src="<?= baseUrl ?>Uploads/products/<?= $PRODUCT->image ?>" width="65" height="80" alt=""> </td>
                                <td><?= $PRODUCT->create_at ?></td>
                                <td><?= $PRODUCT->category ?></td>
                                <?php if ($PRODUCT->status == 'Activo') : ?>
                                    <td><b class="text-success"><?= $PRODUCT->status ?></b></td>
                                <?php else : ?>
                                    <td><b class="text-danger"><?= $PRODUCT->status ?></b></td>
                                <?php endif; ?>
                                <td>
                                    <a href="<?= baseUrl ?>Products/viewProduct&id=<?= $PRODUCT->idproduct  ?>" class="btn-sm btn-info ms-2 mb-1" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver Noticia">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="<?= baseUrl ?>Products/edit&id=<?= $PRODUCT->idproduct ?>" type="button" class="btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Editar Noticia">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <?php if ($PRODUCT->status === 'Activo') : ?>
                                        <a href="<?= baseUrl ?>Products/inactive&id=<?= $PRODUCT->idproduct  ?>" type="button" class="btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Inactivar Noticia"><i class="bi bi-exclamation-circle"></i></a>
                                    <?php else : ?>
                                        <a href="<?= baseUrl ?>Products/active&id=<?= $PRODUCT->idproduct  ?>" type="button" class="btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Activar Noticia"><i class="bi bi-check2-circle"></i></a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>

                    </tbody>
                    <tfoot>
                        <tr class="bg-gradient-secondary text-white">
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Precio Inicial</th>
                            <th>Precio Cliente</th>
                            <th>Bodega</th>
                            <th>Total</th>
                            <th>Descuento</th>
                            <th>Amage</th>
                            <th>Creado</th>
                            <th>Mostrar</th>
                            <th>Categoria</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="row mt-3 text-center text-dark">
                <div class="col-sm-12 col-md-4">
                    <div class="card bg-light mb-2">
                        <b>
                            VALOR INVERTIDO: $<?= isset($totalInit) && is_object($totalInit) ? $totalInit->total_product : "0" ?>
                        </b>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 mb-2">
                    <div class="card bg-light">
                        <b>
                            VALOR COBRADO: $<?= isset($totalProduct) && is_object($totalProduct) ? $totalProduct->total_product_client : "0" ?>
                        </b>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 mb-2">
                    <div class="card bg-light">
                        <b>
                            GANANCIA: $<?= isset($totalInit) && isset($totalProduct) ? ($totalProduct->total_product_client - $totalInit->total_product) : "0" ?>
                        </b>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('view/layout/Footer2.php') ?>