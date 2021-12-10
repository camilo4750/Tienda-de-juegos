<?php require_once('view/layout/Header2.php') ?>
<div class="container-fluid">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= baseUrl ?>Tidings/create">Crear</a></li>
            <li class="breadcrumb-item"><a href="<?= baseUrl ?>Tidings/view">Ver Tabla</a></li>

        </ol>
    </nav>
    <?php if (isset($_SESSION['save']) && $_SESSION['save'] == "exitoso") : ?>
        <div class="row" id="alerta">
            <div class="col-md-12 ">
                <div class=" text-center alert alert-success alert-dismissible fade show" role="alert">
                    <strong> <i class="bi bi-newspaper"></i>
                        La noticia se ha creado correctamente..!</strong>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['edit']) && $_SESSION['edit'] == "exitoso") : ?>
        <div class="row" id="alerta">
            <div class="col-md-12 ">
                <div class=" text-center alert alert-warning alert-dismissible fade show" role="alert">
                    <strong> <i class="bi bi-newspaper"></i>
                        La noticia se ha editado correctamente..!</strong>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['active']) && $_SESSION['active'] == "exitoso") : ?>
        <div class="row" id="alerta">
            <div class="col-md-12 ">
                <div class=" text-center alert alert-info alert-dismissible fade show" role="alert">
                    <strong> <i class="bi bi-newspaper"></i>
                        La noticia se ha activado correctamente..!</strong>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['inactive']) && $_SESSION['inactive'] == "exitoso") : ?>
        <div class="row" id="alerta">
            <div class="col-md-12 ">
                <div class=" text-center alert alert-warning alert-dismissible fade show" role="alert">
                    <strong> <i class="bi bi-newspaper"></i>
                        La noticia se ha Inactivado correctamente..!</strong>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php utilities::deleteSession() ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">NOTICIAS</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="display table responsive table-striped table-bordered" style="width:100%">
                    <thead class="bg-gradient-secondary text-white ">
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Creado</th>
                            <th>Imagen</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($tidings = $TIDINGS->fetch_object()) : ?>
                            <tr>
                                <td class="w-80"><?= $tidings->idtiding ?></td>
                                <td><?= $tidings->name ?></td>
                                <td><?= $tidings->descriptionCor ?></td>
                                <td><?= $tidings->create_at ?></td>
                                <td> <img src="<?= baseUrl ?>uploads/Tidings/<?= $tidings->image ?>" height="80" alt=""></td>
                                <?php if ($tidings->status === "Activo") : ?>
                                    <td class="text-success"><?= $tidings->status ?></td>
                                <?php else : ?>
                                    <td class="text-danger"><?= $tidings->status ?></td>
                                <?php endif; ?>
                                <td>
                                    <a href="<?= baseUrl ?>Tidings/viewTiding&id=<?= $tidings->idtiding  ?>" class="btn-sm btn-info ms-2 mb-1" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver Noticia">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="<?= baseUrl ?>Tidings/edit&id=<?= $tidings->idtiding ?>" type="button" class="btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Editar Noticia">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <?php if ($tidings->status === 'Activo') : ?>
                                        <a href="<?= baseUrl ?>Tidings/inactive&id=<?= $tidings->idtiding  ?>" type="button" class="btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Inactivar Noticia"><i class="bi bi-exclamation-circle"></i></a>
                                    <?php else : ?>
                                        <a href="<?= baseUrl ?>Tidings/active&id=<?= $tidings->idtiding  ?>" type="button" class="btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Activar Noticia"><i class="bi bi-check2-circle"></i></a>
                                    <?php endif; ?>
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
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once('view/layout/Footer2.php') ?>