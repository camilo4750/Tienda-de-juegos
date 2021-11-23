<?php require_once('view/layout/Header2.php') ?>
<div class="container">
    <?php if (isset($_SESSION['save']) && $_SESSION['save'] == "exitoso") : ?>
        <div class="row" id="alerta">
            <div class="col-md-12 ">
                <div class=" text-center alert alert-success alert-dismissible fade show" role="alert">
                    <strong> <i class="bi bi-calendar-day-fill"></i>
                        El evento se ha creado exitosamente..!</strong>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php utilities::deleteSession(); ?>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= baseUrl ?>Events/create">Crear</a></li>
            <li class="breadcrumb-item"><a href="<?= baseUrl ?>Events/view">Ver Tabla</a></li>

        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">EVENTOS</h6>
        </div>
        <div class="card-body">
            <form class="user" action="<?= baseUrl ?>Events/save" method="POST" enctype="multipart/form-data">
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Nombre del evento" name="name" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Descripcion" name="description" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Fecha inicio de inscripciones</label>
                        <input type="date" class="form-control form-control-user" id="exampleInputPassword" required name="create_at">
                    </div>
                    <div class="col-sm-6">
                        <label for="">Fecha fin de inscripciones</label>
                        <input type="datetime-local" class="form-control form-control-user" id="exampleRepeatPassword" required name="expires_in">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="">Imagen del evento</label>
                        <input type="file" class="form-control" id="exampleInputPassword" name="image" required>
                    </div>
                    <div class="col-sm-6">
                        <label for="">Mostrar la publicacion</label>
                        <select class="form-control " aria-label="Default select example" name="status">
                            <option value="Inactivo">Inactivo</option>
                            <option value="Activo">Activo</option>
                        </select>
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