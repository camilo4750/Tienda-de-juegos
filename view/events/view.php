<?php require_once('view/layout/Header2.php') ?>
<div class="container-fluid">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= baseUrl ?>Category/create">Crear</a></li>
            <li class="breadcrumb-item"><a href="<?= baseUrl ?>Category/view">Ver Tabla</a></li>

        </ol>
    </nav>
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
                            <th><?= $EVENT->idevent ?></th>
                            <th><?= $EVENT->name ?></th>
                            <th><?= $EVENT->descriptions ?></th>
                            <th><?= $EVENT->create_at ?></th>
                            <th><?= $EVENT->expires_in ?></th>
                            <th> <img src="<?= baseUrl ?>Uploads/events/<?= $EVENT->image ?>" alt="" height="70" width="100"></th>
                            <?php if ($EVENT->status === 'Activo') : ?>
                                <th class="text-success"><?= $EVENT->status ?></th>
                            <?php else : ?>
                                <th class="text-danger"><?= $EVENT->status ?></th>
                            <?php endif; ?>
                            <th>
                                <a href="<?= baseUrl ?>Events/viewEvent&id=<?= $EVENT->idevent  ?>" class="btn-sm btn-info mt-4" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver presentacion del evento"><i class="bi bi-eye"></i></a>
                                <a href="<?= baseUrl ?>Events/edit&id=<?= $EVENT->idevent ?>" class="btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Editar Categoria">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <?php if ($EVENT->status === 'Activo') : ?>
                                    <a href="<?= baseUrl ?>Events/inactive&id=<?= $EVENT->idevent  ?>" class="btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Inactivar Categoria"><i class="bi bi-exclamation-circle"></i></a>
                                <?php else : ?>
                                    <a href="<?= baseUrl ?>Events/active&id=<?= $EVENT->idevent  ?>" class="btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Activar Categoria"><i class="bi bi-check2-circle"></i></a>
                                <?php endif; ?>
                            </th>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
                <tr>
                    <td class="bg-gradient-secondary text-white">ID</td>
                    <td class="bg-gradient-secondary text-white">Nombre</td>
                    <td class="bg-gradient-secondary text-white">Descripcion</td>
                    <td class="bg-gradient-secondary text-white">Inicio</td>
                    <td class="bg-gradient-secondary text-white">FIn</td>
                    <td class="bg-gradient-secondary text-white">Imagen</td>
                    <td class="bg-gradient-secondary text-white">Estado</td>
                    <td class="bg-gradient-secondary text-white">Acciones</td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?php require_once('view/layout/Footer2.php') ?>