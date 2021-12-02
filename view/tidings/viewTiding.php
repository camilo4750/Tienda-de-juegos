<?php require_once('view/layout/Header2.php') ?>
<div class="container">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= baseUrl ?>Tidings/create">Crear</a></li>
            <li class="breadcrumb-item"><a href="<?= baseUrl ?>Tidings/view">Ver Tabla</a></li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <?php if (isset($TIDING) && is_object($TIDING)) : ?>
                <h6 class="m-0 font-weight-bold text-primary">VER NOTICIA N°<?= $TIDING->idtiding ?></h6>
        </div>
        <div class="card-body px-5">
            <table class="table table-striped">
                <thead class=" thead-dark">
                    <tr>
                        <th scope="col">Item</th>
                        <th scope="col">Dato</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Titulo:</th>
                        <td><?= $TIDING->name ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Descripcion:</th>
                        <td><?= $TIDING->description ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Creado:</th>
                        <td><?= $TIDING->create_at ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Image:</th>
                        <td> <img src="<?= baseUrl ?>Uploads/Tidings/<?= $TIDING->image ?>" width="200" height="100" alt=""></td>
                    </tr>
                    <tr>
                        <th scope="row">Estado:</th>
                        <td><?= $TIDING->status ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="mx-5">
                <h4 class="text-center">Previsulización</h4>
                <div class="card mb-3 shadow">
                    <div class="row g-0">
                        <div class="col-md-5">
                            <img src="<?= baseUrl ?>uploads/Tidings/<?= $TIDING->image ?>" class="img-fluid rounded-start p-0" alt="...">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body">
                                <h5 class="card-title"><?= $TIDING->name ?></h5>
                                <p class="card-text"><?= $TIDING->description ?></p>
                                <p class="card-text"><small class="text-muted">Ultima actializacion: <?= $TIDING->create_at ?></small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>
</div>
<?php require_once('view/layout/Footer2.php') ?>