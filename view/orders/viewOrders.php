<?php require_once('view/layout/Header2.php') ?>
<div class="container">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">LISTA DE PEDIDOS</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="display table responsive table-hover table-bordered" style="width:100%">
                    <thead class="bg-gradient-secondary text-white">
                        <tr>
                            <th>ID</th>
                            <th>Precio</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php while ($order = $allOrders->fetch_object()) : ?>

                            <tr>
                                <td> <a href="<?= baseUrl ?>Orders/detailsOrder&id=<?= $order->idorder ?>"><?= $order->idorder ?></a></td>
                                <td>$<?= number_format($order->coste) ?></td>
                                <td><?= $order->create_ad ?></td>
                                <td><?= $order->time ?></td>
                                <?php if ($order->status == 'Pendiente') : ?>
                                    <td class="text-danger font-weight-bolder"><?= $order->status ?></td>
                                <?php elseif ($order->status == 'Preparacion') : ?>
                                    <td class="text-warning font-weight-bolder"><?= $order->status ?></td>
                                <?php elseif ($order->status == "Enviado") : ?>
                                    <td class="text-info font-weight-bolder"><?= $order->status ?></td>
                                <?php elseif ($order->status == "Entregado") : ?>
                                    <td class="text-success font-weight-bolder"><?= $order->status ?></td>
                                <?php endif; ?>

                            </tr>

                        <?php endwhile; ?>
                    </tbody>
                    <tfoot>
                        <tr class="bg-gradient-secondary text-white">
                            <th>ID</th>
                            <th>Precio</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Estado</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once('view/layout/Footer2.php') ?>