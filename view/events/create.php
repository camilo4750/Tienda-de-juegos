<?php require_once('view/layout/Header2.php') ?>
<div class="container">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= baseUrl ?>Events/create">Crear</a></li>
            <li class="breadcrumb-item"><a href="<?= baseUrl ?>Events/view">Ver Tabla</a></li>

        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <?php if (isset($oneEvent) && is_object($oneEvent)) : ?>
                <h6 class="m-0 font-weight-bold text-primary">EDITAR EVENTO</h6>
                <?php $typeAction = baseUrl . "Events/save&id=" . $oneEvent->idevent ?>
            <?php else : ?>
                <h6 class="m-0 font-weight-bold text-primary">CREAR EVENTO</h6>
                <?php $typeAction = baseUrl . "Events/save" ?>
            <?php endif; ?>
        </div>
        <div class="card-body">
            <form class="user" action="<?= $typeAction ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Nombre del evento" name="name" required value="<?= isset($oneEvent) && is_object($oneEvent) ? $oneEvent->name : "" ?>">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Descripcion" name="description" required value="<?= isset($oneEvent) && is_object($oneEvent) ? $oneEvent->description : "" ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Fecha inicio de inscripciones</label>
                        <input type="date" class="form-control form-control-user" id="exampleInputPassword" required name="create_at" value="<?= isset($oneEvent) && is_object($oneEvent) ? $oneEvent->create_at : "" ?>">
                    </div>
                    <div class="col-sm-6">
                        <?php if (isset($oneEvent) && is_object($oneEvent)) : ?>
                            <label for="">Fecha fin: "<?= $oneEvent->expires_in ?>" - Seleccione otra Fecha para cambiar</label>
                        <?php else : ?>
                            <label for="">Fecha fin de inscripciones:</label>
                        <?php endif; ?>
                        <input type="datetime-local" class="form-control form-control-user" id="exampleRepeatPassword" name="expires_in" value="<?= isset($oneEvent) && is_object($oneEvent) ? $oneEvent->expires_in : "" ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <?php if (isset($oneEvent) && is_object($oneEvent)) : ?>
                            <label for="">Imagen del evento:</label>
                            <input type="file" class="form-control" id="exampleInputPassword" name="image">
                            <img src="<?= baseUrl ?>Uploads/events/<?= $oneEvent->image ?>" class="mt-2
                            " height="90" width="180" alt="">
                        <?php else : ?>
                            <label for="">Imagen del evento</label>
                            <input type="file" class="form-control" id="exampleInputPassword" name="image" required>
                        <?php endif; ?>

                    </div>
                    <?php if (!isset($oneEvent)) : ?>
                        <div class="col-sm-6">
                            <label for="">Mostrar la publicacion</label>
                            <select class="form-control " aria-label="Default select example" name="status" value="<?= isset($oneEvent) && is_object($oneEvent) ? $oneEvent->status : "" ?>">
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                            </select>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if (isset($oneEvent) && is_object($oneEvent)) : ?>
                    <button class="btn btn-warning btn-icon-split float-right" type="submit">
                        <span class="icon text-white-50">
                            <i class="bi bi-check-circle-fill"></i>
                        </span>
                        <span class="text">EDITAR CATEGORIA</span>
                    </button>
                <?php else : ?>
                    <button class="btn btn-success btn-icon-split float-right" type="submit">
                        <span class="icon text-white-50">
                            <i class="bi bi-check-circle-fill"></i>
                        </span>
                        <span class="text">CREAR CATEGORIA</span>
                    </button>
                <?php endif; ?>

            </form>
        </div>
    </div>
</div>
<?php require_once('view/layout/Footer2.php') ?>