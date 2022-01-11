<?php require_once('view/layout/Header2.php') ?>
<div class="container">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= baseUrl ?>Clients/view">Ver Tabla</a></li>
        </ol>
    </nav>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">CLIENTES</h6>
        </div>
        <div class="card-body">
            <table id="example" class="display table responsive  table-striped table-bordered" style="width:100%">
                <thead class="bg-gradient-secondary text-white">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Descripcion</th>
                        <th>Creado</th>
                        <th>Estado</th>
                        <th>Premium</th>
                    </tr>
                </thead>
                <?php while ($CLIENT = $CLIENTS->fetch_object()) : ?>
                    <tr>
                        <td><?= $CLIENT->idclient ?></td>
                        <td><?= $CLIENT->name ?></td>
                        <td><?= $CLIENT->surname ?></td>
                        <td><?= $CLIENT->email ?></td>
                        <td><?= $CLIENT->image ?></td>
                        <td><?= $CLIENT->description ?></td>
                        <td><?= $CLIENT->create_at ?></td>
                        <td><?= $CLIENT->status ?></td>
                        <td><?= $CLIENT->client_fixed ?></td>
                    </tr>
                <?php endwhile; ?>
                <tbody>
                <tfoot>
                    <tr>
                        <th class="bg-gradient-secondary text-white">ID</th>
                        <th class="bg-gradient-secondary text-white">Nombre</th>
                        <th class="bg-gradient-secondary text-white">Apellido</th>
                        <th class="bg-gradient-secondary text-white">Email</th>
                        <th class="bg-gradient-secondary text-white">Image</th>
                        <th class="bg-gradient-secondary text-white">Descripcion</th>
                        <th class="bg-gradient-secondary text-white">Creado</td>
                        <th class="bg-gradient-secondary text-white">Estado</th>
                        <th class="bg-gradient-secondary text-white">Premium</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?php require_once('view/layout/Footer2.php') ?>