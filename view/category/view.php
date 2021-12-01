<?php require_once('view/layout/Header2.php') ?>
<div class="container-fluid">
    <?php if (isset($_SESSION['save']) && $_SESSION['save'] === "exitoso") : ?>
        <div class="row" id="alerta">
            <div class="col-md-12 ">
                <div class=" text-center alert alert-success alert-dismissible fade show" role="alert">
                    <strong> <i class="bi bi-file-earmark-plus-fill"></i> La categoria se ha creado correctamente..!</strong>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['edit']) && $_SESSION['edit'] === "exitoso") : ?>
        <div class="row" id="alerta">
            <div class="col-md-12 ">
                <div class=" text-center alert alert-warning alert-dismissible fade show" role="alert">
                    <strong> <i class="bi bi-file-earmark-plus-fill"></i> La categoria se ha actualizado correctamente..!</strong>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['active']) && $_SESSION['active'] === "exitoso") : ?>
        <div class="row" id="alerta">
            <div class="col-md-12 ">
                <div class=" text-center alert alert-info alert-dismissible fade show" role="alert">
                    <strong> <i class="bi bi-file-earmark-plus-fill"></i> La categoria se ha activado correctamente..!</strong>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['inactive']) && $_SESSION['inactive'] === "exitoso") : ?>
        <div class="row" id="alerta">
            <div class="col-md-12 ">
                <div class=" text-center alert alert-warning alert-dismissible fade show" role="alert">
                    <strong> <i class="bi bi-file-earmark-plus-fill"></i> La categoria se ha inactivado correctamente..!</strong>
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
            <h6 class="m-0 font-weight-bold text-primary">CATEGORIAS</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="display table responsive  table-striped table-bordered" style="width:100%">
                    <thead class="bg-gradient-secondary text-white">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Mostar</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($categoria = $CATEGORIES->fetch_object()) : ?>
                            <tr>
                                <td> <?= $categoria->idcategory ?></td>
                                <td><?= $categoria->name ?></td>
                                <?php if ($categoria->status === "Activo") : ?>
                                    <td class="text-success"><?= $categoria->status ?></td>
                                <?php else : ?>
                                    <td class="text-danger"><?= $categoria->status ?></td>
                                <?php endif; ?>
                                <td>
                                    <a href="<?= baseUrl ?>Category/edit&id=<?= $categoria->idcategory ?>" class="mx-2 btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Editar Categoria">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <?php if ($categoria->status === 'Activo') : ?>
                                        <a href="<?= baseUrl ?>Category/inactive&id=<?= $categoria->idcategory ?>" class="btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Inactivar Categoria"><i class="bi bi-exclamation-circle"></i></a>
                                    <?php else : ?>
                                        <a href="<?= baseUrl ?>Category/active&id=<?= $categoria->idcategory ?>" class="btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Activar Categoria"><i class="bi bi-check2-circle"></i></a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                    <tfoot>
                        <tr class="bg-gradient-secondary text-white">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Mostrar</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once('view/layout/Footer2.php') ?>