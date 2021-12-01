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
            <?php if (isset($TIDINGS) && is_object($TIDINGS)) : ?>
                <h6 class="m-0 font-weight-bold text-primary">EDITAR NOTICIA</h6>
                <?php $typeAction = baseUrl .  "Tidings/save&id=" . $TIDINGS->idtiding ?>
            <?php else : ?>
                <h6 class="m-0 font-weight-bold text-primary">NOTICIA</h6>
                <?php $typeAction = baseUrl . "Tidings/save" ?>
            <?php endif; ?>
        </div>
        <div class="card-body">

            <form class="user" action="<?= $typeAction ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" required name="name" placeholder="Titutlo" value="<?= isset($TIDINGS) && is_object($TIDINGS) ? $TIDINGS->name : "" ?>">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" required name="description" placeholder="Descripcion" value="<?= isset($TIDINGS) && is_object($TIDINGS) ? $TIDINGS->description : "" ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <?php if (isset($TIDINGS) && is_object($TIDINGS)) : ?>
                            <label for="formFile" class="form-label">Cambiar Imagen:</label>
                            <img src="<?= baseUrl ?>Uploads/Tidings/<?= $TIDINGS->image ?>" height="60" width="100" class="mb-2">
                            <input class="form-control" name="image" type="file" id="formFile">
                        <?php else : ?>
                            <label for="formFile" class="mt-4 form-label">Seleccionar Imagen:</label>
                            <input class="form-control" name="image" required type="file" id="formFile">
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-6 mt-5">
                        <input type="date" class="form-control form-control-user" name="create_at" value="<?= isset($TIDINGS) && is_object($TIDINGS) ? $TIDINGS->create_at : "" ?>">
                    </div>
                </div>
                <?php if (isset($TIDINGS) && is_object($TIDINGS)) : ?>
                    <button class="btn btn-warning btn-icon-split float-right" type="submit">
                        <span class="icon text-white-50">
                            <i class="bi bi-check-circle-fill"></i>
                        </span>
                        <span class="text">EDITAR NOTICIA</span>
                    </button>
                <?php else : ?>
                    <button class="btn btn-success btn-icon-split float-right" type="submit">
                        <span class="icon text-white-50">
                            <i class="bi bi-check-circle-fill"></i>
                        </span>
                        <span class="text">CREAR NOTICIA</span>
                    </button> <?php endif; ?>
            </form>
        </div>
    </div>
</div>
<?php require_once('view/layout/Footer2.php') ?>