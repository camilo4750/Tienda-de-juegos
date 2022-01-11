<?php require_once('view/layout/Header2.php') ?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DESCRIPCION PEDIDO N° <?= $oneOrder->idorder ?></h6>
        </div>
        <div class="card-body text-description">
            <?php if (isset($_SESSION['edit']) && $_SESSION['edit'] == "exitoso") : ?>
                <div class="row" id="alerta">
                    <div class="col-md-12 ">
                        <div class=" text-center alert alert-info alert-dismissible fade show" role="alert">
                            <strong>El estado del pedido ha cambiado exitosamente</strong>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (isset($_SESSION['save']) && $_SESSION['save'] == "exitoso") : ?>
                <div class="row" id="alerta">
                    <div class="col-md-12">
                        <div class="text-center alert alert-success alert-dismissible fade show" role="alert">
                            <strong>El # de guia se agrego correctamente</strong>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php utilities::deleteSession(); ?>
            <div class="row">
                <div class="col-md-12 col-lg-6 col-xxl-6">
                    <h5>Cambiar estado:</h5>
                    <form action="<?= baseUrl ?>Orders/status&id=<?= $oneOrder->idorder ?>" method="POST">
                        <select class="form-control" name="status">
                            <option value="Pendiente" <?= $oneOrder->status == "Pendiente" ? 'selected' : ''; ?>>Pendiente</option>
                            <option value="Preparacion" <?= $oneOrder->status == "Preparacion" ? 'selected' : ''; ?>>Preparacion</option>
                            <option value="Enviado" <?= $oneOrder->status == "Enviado" ? 'selected' : ''; ?>>Enviado</option>
                            <option value="Entregado" <?= $oneOrder->status == "Entregado" ? 'selected' : ''; ?>>Entregado</option>
                        </select>
                        <button class="btn btn-warning mt-2 float-right" type="submit">Cambiar Estado</button>
                    </form>
                </div>
                <div class="col-md-12 col-lg-6 col-xxl-6">
                    <h5>Agregar # de Guia:</h5>
                    <form action="<?= baseUrl ?>Orders/saveGuide&id=<?= $oneOrder->idorder ?>" method="POST">
                        <input type="text" class="form-control" name="guide_number" required>
                        <button class="btn btn-warning mt-2 float-right" type="submit">Agregar Guia</button>
                    </form>
                </div>
            </div>
            <hr>
            <h3 class="mt-2">Datos del pedido:</h3>
            <ul class="list-unstyled">
                <li>Numero de pedido: <strong><?= $oneOrder->idorder ?></strong></li>
                <li>Total a pagar: <strong>$<?= number_format($oneOrder->coste) ?> mil</strong></li>
                <li># de guía: <strong><?= isset($oneOrder) && $oneOrder != NULL ? $oneOrder->guide_number : "Aun no se realiza el envio" ?></strong></li>
                <li>Estado del pedido:
                    <strong><?= $oneOrder->status ?></strong>
                </li>
                <li>Fecha y hora de la solicitud: <strong> <?= $oneOrder->create_ad . " / " . $oneOrder->time ?></strong></li>
            </ul>
            <div class="table-responsive">
                <table class="table bg-light table-hover table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Unidades</th>
                            <th scope="col">Precios</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php while ($product = $allProducts->fetch_object()) : ?>
                            <tr>
                                <td><img src="<?= baseUrl ?>Uploads/products/<?= $product->image ?>" height="100" width="80" alt=""></td>
                                <td><?= $product->name ?></td>
                                <td><?= $product->unidades ?></td>
                                <td>$<?= number_format($product->price * $product->unidades) ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once('view/layout/Footer2.php') ?>