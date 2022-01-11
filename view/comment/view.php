<?php require_once('view/layout/Header2.php') ?>
<div class="container">
    <?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == "exitoso") : ?>
        <div class="row" id="alerta">
            <div class="col-md-12 ">
                <div class=" text-center alert alert-danger alert-dismissible fade show" role="alert">
                    <strong> <i class="bi bi-chat-dots"></i> El Comentario se ha eliminado exitosamente..!</strong>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php utilities::deleteSession() ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Commentarios realizados</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="display table responsive table-striped table-bordered" style="width:100%">
                    <thead class="bg-gradient-secondary text-white text-center">
                        <tr>
                            <th>ID</th>
                            <th>Comentario</th>
                            <th>Creado</th>
                            <th>Hora</th>
                            <th>Producto</th>
                            <th>Cliente</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($comments = $see->fetch_object()) : ?>
                            <tr>
                                <td><?= $comments->idcomment ?></td>
                                <td><?= $comments->comment ?></td>
                                <td><?= $comments->create_at ?></td>
                                <td><?= $comments->time ?></td>
                                <td><a href="<?= baseUrl ?>Products/viewProduct&id=<?= $comments->Products_id ?>"><?= $comments->nameProduct ?></a></td>
                                <td><a href="<?= baseUrl ?>Clients/myprofile&id=<?= $comments->Clients_id ?>"><?= $comments->namePerson ?></a></td>
                                <td>
                                    <a href="<?= baseUrl ?>Comments/deleteAdmin&id=<?= $comments->idcomment ?>" class="btn btn-c btn-sm"><i class="bi bi-x-octagon"></i></a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                    <tfoot>
                        <tr class="bg-gradient-secondary text-white">
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Creado</th>
                            <th>Imagen</th>
                            <th>Estado</th>
                            <th>Options</th>

                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once('view/layout/Footer2.php') ?>