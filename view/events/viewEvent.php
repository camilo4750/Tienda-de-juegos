<?php require_once('view/layout/Header2.php') ?>
<div class="container">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= baseUrl ?>Events/create">Crear</a></li>
            <li class="breadcrumb-item"><a href="<?= baseUrl ?>Events/view">Ver Tabla</a></li>
        </ol>
    </nav>
    <div class="container-fluid p-0">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">PREVISUALIZACIÓN EVENTO N°<?= $EVENT->idevent ?></h6>

        </div>
        <div class="card border-0 bg-dark text-white">
            <?php if (isset($EVENT) && is_object($EVENT)) : ?>
                <img src="<?= baseUrl ?>Uploads/events/<?= $EVENT->image ?>" class="card-img" height="550" width="100" alt="...">
                <div class="fondo">
                    <div class="card-img-overlay mt-5">
                        <h5 class="card-title text-title text-white"><?= $EVENT->name ?></h5>
                        <p class="card-text text-primary2"><?= $EVENT->description ?></p>
                        <p class="card-text text-primary2">Fecha Inicio De Inscripciones: <?= $EVENT->create_at ?> Fecha Fin De Inscripcion: <?= $EVENT->expires_in ?></p>
                        <a href="" class="btn btn-success">CLICK PARA REGISTRARTE EN ESTE EVENTO</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php require_once('view/layout/Footer2.php') ?>