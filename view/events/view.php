<?php require_once('view/layout/Header2.php') ?>
<div class="container-fluid">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= baseUrl ?>Events/create">Crear</a></li>
            <li class="breadcrumb-item"><a href="<?= baseUrl ?>Events/view">Ver Tabla</a></li>

        </ol>
    </nav>
    <?php if (isset($_SESSION['save']) && $_SESSION['save'] == "exitoso") : ?>
        <div class="row" id="alerta">
            <div class="col-md-12 ">
                <div class=" text-center alert alert-success alert-dismissible fade show" role="alert">
                    <strong> <i class="bi bi-newspaper"></i>
                        El evento se ha creado correctamente..!</strong>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['edit']) && $_SESSION['edit'] == "exitoso") : ?>
        <div class="row" id="alerta">
            <div class="col-md-12 ">
                <div class=" text-center alert alert-warning alert-dismissible fade show" role="alert">
                    <strong> <i class="bi bi-newspaper"></i>
                        El evento se ha editado correctamente..!</strong>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['active']) && $_SESSION['active'] == "exitoso") : ?>
        <div class="row" id="alerta">
            <div class="col-md-12 ">
                <div class=" text-center alert alert-info alert-dismissible fade show" role="alert">
                    <strong> <i class="bi bi-newspaper"></i>
                        El evento se ha activado correctamente..!</strong>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['inactive']) && $_SESSION['inactive'] == "exitoso") : ?>
        <div class="row" id="alerta">
            <div class="col-md-12 ">
                <div class=" text-center alert alert-warning alert-dismissible fade show" role="alert">
                    <strong> <i class="bi bi-newspaper"></i>
                        El evento se ha Inactivado correctamente..!</strong>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php utilities::deleteSession() ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">EVENTOS</h6>
        </div>
        <div class="card-body">
            <table id="example" class="display table responsive  table-striped table-bordered">
                <thead class="bg-gradient-secondary text-white">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Inicio</th>
                        <th>FIn</th>
                        <th>Imagen</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($EVENT = $EVENTS->fetch_object()) : ?>
                        <tr>
                            <td><?= $EVENT->idevent ?></td>
                            <td><?= $EVENT->name ?></td>
                            <td><?= $EVENT->descriptionCor ?></td>
                            <td><?= $EVENT->create_at ?></td>
                            <td><?= $EVENT->expires_in ?></td>
                            <td> <img src="<?= baseUrl ?>Uploads/events/<?= $EVENT->image ?>" alt="" height="70" width="100"></td>
                            <?php if ($EVENT->status === 'Activo') : ?>
                                <td class="text-success"><?= $EVENT->status ?></td>
                            <?php else : ?>
                                <td class="text-danger"><?= $EVENT->status ?></td>
                            <?php endif; ?>
                            <td>
                                <a href="<?= baseUrl ?>Events/viewEvent&id=<?= $EVENT->idevent  ?>" type="button" class="btn-sm btn-info ms-4 mb-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver presentacion del evento"><i class="bi bi-eye"></i></a>
                                <a href="<?= baseUrl ?>Events/edit&id=<?= $EVENT->idevent ?>" type="button" class="btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Editar Evento">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <?php if ($EVENT->status === 'Activo') : ?>
                                    <a href="<?= baseUrl ?>Events/inactive&id=<?= $EVENT->idevent  ?>" type="button" class="btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Inactivar Evento"><i class="bi bi-exclamation-circle"></i></a>
                                <?php else : ?>
                                    <a href="<?= baseUrl ?>Events/active&id=<?= $EVENT->idevent  ?>" type="button" class="btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Activar Evento"><i class="bi bi-check2-circle"></i></a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
                <tr>
                    <th class="bg-gradient-secondary text-white">ID</th>
                    <th class="bg-gradient-secondary text-white">Nombre</th>
                    <th class="bg-gradient-secondary text-white">Descripcion</th>
                    <th class="bg-gradient-secondary text-white">Inicio</th>
                    <th class="bg-gradient-secondary text-white">FIn</th>
                    <th class="bg-gradient-secondary text-white">Imagen</th>
                    <th class="bg-gradient-secondary text-white">Estado</th>
                    <th class="bg-gradient-secondary text-white">Acciones</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?php require_once('view/layout/Footer2.php') ?>