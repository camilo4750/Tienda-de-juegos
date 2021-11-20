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
            <h6 class="m-0 font-weight-bold text-primary">CATEGORIAS</h6>
        </div>
        <div class="card-body">
            <table id="example" class="display" style="width:100%">
                <thead class="bg-gradient-secondary text-white">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                    </tr>
                </thead>

                <?php while ($categoria = $CATEGORY->fetch_object()) : ?>
                    <tr>
                        <td> <?= $categoria->idcategory ?></td>
                        <td><?= $categoria->name ?></td>
                    </tr>
                <?php endwhile; ?>
                <tbody>
                    <tr>
                        <td class="bg-gradient-secondary text-white">ID</td>
                        <td class="bg-gradient-secondary text-white">Nombre</td>

                    </tr>
                    </tfoot>
            </table>
        </div>
    </div>
</div>
<?php require_once('view/layout/Footer2.php') ?>