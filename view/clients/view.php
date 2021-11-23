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
                        <th><?= $CLIENT->idclient ?></th>
                        <th><?= $CLIENT->name ?></th>
                        <th><?= $CLIENT->surname ?></th>
                        <th><?= $CLIENT->email ?></th>
                        <th><?= $CLIENT->image ?></th>
                        <th><?= $CLIENT->description ?></th>
                        <th><?= $CLIENT->create_at ?></th>
                        <th><?= $CLIENT->status ?></th>
                        <th><?= $CLIENT->client_fixed ?></th>
                    </tr>
                <?php endwhile; ?>
                <tbody>
                    <tr>
                        <td class="bg-gradient-secondary text-white">ID</td>
                        <td class="bg-gradient-secondary text-white">Nombre</td>
                        <td class="bg-gradient-secondary text-white">Apellido</td>
                        <td class="bg-gradient-secondary text-white">Email</td>
                        <td class="bg-gradient-secondary text-white">Image</td>
                        <td class="bg-gradient-secondary text-white">Descripcion</td>
                        <td class="bg-gradient-secondary text-white">Creado</td>
                        <td class="bg-gradient-secondary text-white">Estado</td>
                        <td class="bg-gradient-secondary text-white">Premium</td>





                    </tr>
                    </tfoot>
            </table>
        </div>
    </div>
</div>
<?php require_once('view/layout/Footer2.php') ?>