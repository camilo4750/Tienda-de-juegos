<?php require_once('view/layout/Header2.php') ?>
<div class="container-fluid">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= baseUrl ?>Tidings/create">Crear</a></li>
            <li class="breadcrumb-item"><a href="<?= baseUrl ?>Tidings/view">Ver Tabla</a></li>

        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">CATEGORIAS</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="display table responsive  table-striped table-bordered" style="width:100%">
                    <thead class="bg-gradient-secondary text-white ">
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Creado</th>
                            <th>Imagen</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <?php while ($tidings = $TIDINGS->fetch_object()) : ?>
                        <tr>
                            <th><?= $tidings->idtiding ?></th>
                            <th><?= $tidings->name ?></th>
                            <th><?= $tidings->description ?></th>
                            <th><?= $tidings->create_at ?></th>
                            <th><?= $tidings->image ?></th>
                            <th><?= $tidings->status ?></th>

                        </tr>
                    <?php endwhile; ?>
                    <tbody>
                        <tr class="bg-gradient-secondary text-white">
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Descripcion</th>
                            <th>Creado</th>
                            <th>Imagen</th>
                            <th>Estado</th>
                        </tr>
                        </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once('view/layout/Footer2.php') ?>