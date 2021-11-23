<?php require_once('view/layout/Header2.php') ?>
<div class="container">
    <?php if (isset($_SESSION['save']) && $_SESSION['save'] == "exitoso") : ?>
        <div class="row" id="alerta">
            <div class="col-md-12 ">
                <div class=" text-center alert alert-success alert-dismissible fade show" role="alert">
                    <strong> <i class="bi bi-file-earmark-plus-fill"></i> La categoria se ha creado exitosamente..!</strong>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php utilities::deleteSession(); ?>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= baseUrl ?>Category/create">Crear</a></li>
            <li class="breadcrumb-item"><a href="<?= baseUrl ?>Category/view">Ver Tabla</a></li>

        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">CATEGORIA</h6>
        </div>
        <div class="card-body">

            <form class="user" action="<?= baseUrl ?>Category/save" method="POST">
                <div class="form-group row">
                    <div class="col-sm-12 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" name="name" required placeholder="Nombre de la categoria">
                    </div>

                </div>
                <button class="btn btn-success btn-icon-split float-right" type="submit">
                    <span class="icon text-white-50">
                        <i class="bi bi-check-circle-fill"></i>
                    </span>
                    <span class="text">CREAR CATEGORIA</span>
                </button>
            </form>
        </div>
    </div>
</div>
<?php require_once('view/layout/Footer2.php') ?>