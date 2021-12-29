<?php require_once('View/layout/Header1.php'); ?>
<?php if (isset($_SESSION['User'])  && $_SESSION['User']->idclient === $_SESSION['User']->idclient) : ?>
    <div class="container">
        <div class="row">
            <dic class="col-12">
                <div class="card mt-7">
                    <div class="card-header">
                        <h2 class="text-title">PEDIDO REALIZADO</h2>
                    </div>
                    <div class="card-body text-description">
                        <?php if (isset($_SESSION['saveOrder']) && $_SESSION['saveOrder'] = "exitoso") : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <ul class="list-unstyled p-2">
                                    <li> <strong><i class="bi bi-person-fill"></i> Su solicitud de pedido ha sido exitosa,
                                            por favor realicpe los siguientes pasos para completar la compra:</strong> </li>
                                    <li>1. Realice el pago del total a la siguiente <strong> CUENTA BANCOLOMBIA - 15266285621 </strong> </li>
                                    <li>2. Apenas sea realizado el pago el "Estado" de su compra cambiara a Enviado</li>
                                    <li>3. Podra observar el estado de su pedido directamente en la pagina oficial de Servientrega -> <a href="https://www.servientrega.com/wps/portal/!ut/p/z1/04_Sj9CPykssy0xPLMnMz0vMAfIjo8ziTS08TTwMTAz93f1cTAwCg5yMfP0MHY0cfY30wwkpiAJKG-AAjgb6XoQUAF1gVOTr7JuuH1WQWJKhm5mXlq8f4Zyfk5-blJmoH1GQWlQMdGqxfkRmXmZyZj7QRVGEzCzIjajycbL0BACT8ktL/dz/d5/L2dBISEvZ0FBIS9nQSEh/?gclid=Cj0KCQiA5aWOBhDMARIsAIXLlkfqlf77hCHJ9waV0rnLtC8NzkD2ebyhbyzhgGsCZnbQ_Bf1UKXqpHIaAgXOEALw_wcB">Link Aquí</a>
                                    </li>
                                    <li>4. Disfrutar de la calidad de nuestros productos garantizado por <strong>QHICK SHOPPING</strong></li>
                                    <li>5. Prodras contar con esta informacion en tu perfil -> <a href="<?= baseUrl ?>Clients/myProfile&id=<?= $_SESSION['User']->idclient ?>">VER MI PERFIL</a></li>
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <h3>Datos del pedido:</h3>
                        <ul class="list-unstyled">
                            <li>Numero de pedido: <strong><?= $oneOrder->idorder ?></strong></li>
                            <li>Total a pagar: <strong>$<?= $oneOrder->coste ?> mil</strong></li>
                            <li># de guía: <strong><?= isset($oneOrder) && $oneOrder != NULL ? $oneOrder->guide_number : "Aun no se realiza el envio" ?></strong></li>
                            <li>Estado del pedido: <strong><?= $oneOrder->status ?></strong></li>
                            <li>Fecha y hora de la solicitud: <strong> <?= $oneOrder->create_ad . " / " . $oneOrder->time ?></strong></li>
                        </ul>
                        <div class="table-responsive mx-5">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Image</th>
                                        <th scope="col">Producto</th>
                                        <th scope="col">Unidades</th>
                                        <th scope="col">Precios</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($product = $allProducts->fetch_object()) : ?>
                                        <tr>
                                            <td><img src="<?= baseUrl ?>Uploads/products/<?= $product->image ?>" height="100" width="80" alt=""></td>
                                            <td><?= $product->name ?></td>
                                            <td><?= $product->unidades ?></td>
                                            <td>$<?= $product->price * $product->unidades ?></td>
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="position-relative mt-5">
                            <div class="position-absolute bottom-50 end-50">
                                <a href="<?= baseUrl ?>Products/index" class="btn btn-info">Aceptar</a>
                            </div>

                        </div>
                    </div>
                </div>
            </dic>
        </div>
    </div>
<?php endif; ?>
<?php require_once('view/layout/Footer1.php'); ?>