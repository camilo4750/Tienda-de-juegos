<?php require_once('view/layout/Header2.php') ?>
<?php if (isset($_SESSION['Admin'])) : ?>
    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <div class="card mb-4  p-3 rounded-3 border-0 shadow">
                    <div class="container">
                        <div class="row">
                            <?php if (isset($_SESSION['edit']) && $_SESSION['edit'] = "error1") : ?>
                                <div class="row" id="mydiv">
                                    <div class="col-md-12">
                                        <div class=" alert alert-warning alert-dismissible fade show" role="alert">
                                            <strong><i class="bi bi-person-x-fill"></i></strong> Los datos se actualizaron correctamente
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php utilities::deleteSession(); ?>
                            <div class="col-sm-12 col-lg-2">
                                <div class="d-flex align-items-center">
                                    <div class="image">
                                        <img src="<?= baseUrl ?>Uploads/profiles/<?= $adminData->image ?>" class="ms-3 rounded-3" width="135" height="135">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-10 p-0">
                                <div class="d-flex align-items-center mt-2">
                                    <div class="w-100">
                                        <h4 class="mb-0 mt-0">
                                            <?= $adminData->name . " " .  $adminData->surname ?> - <?= $adminData->email ?>
                                        </h4>
                                        <span class="number1 text-dark"><?= $adminData->description  ?></span> - <span class="apodo fs-4 number1 text-dark"><?= $adminData->nickname  ?></span>
                                        <div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">
                                            <div class="d-flex flex-column"> <span class="rating">ID</span> <span class="number3"><?= $adminData->idclient ?></span> </div>
                                            <div class="d-flex flex-column"> <span class="articles">creado:</span> <span class="number1"><?= $adminData->create_at ?></span> </div>
                                            <div class="d-flex flex-column text-uppercase number1"> <span class="followers">Rol:</span>
                                                <?= $adminData->rol ?>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        CAMBIAR DATOS:
                    </div>
                    <?php if (isset($_SESSION['Admin']) && $_SESSION['Admin']->idclient === $adminData->idclient) : ?>
                        <div class="card-body">
                            <form action="<?= baseUrl ?>Clients/save&id=<?= $adminData->idclient  ?>" method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label>Nombres</label>
                                    <input type="text" class="form-control" required name="name" value="<?= $adminData->name ?>">

                                </div>
                                <div class="form-floating mb-3">
                                    <label>Apellidos</label>
                                    <input type="text" class="form-control" required name="surname" value="<?= $adminData->surname ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="">Foto perfil: (seleccione para cambiar)</label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                                <div class="form-floating mb-3">
                                    <label>Descripcion</label>
                                    <input type="text" class="form-control" required name="description" value="<?= $adminData->description ?>">
                                </div>
                                <div class="form-floating mb-3">
                                    <label>Email</label>
                                    <input type="email" class="form-control" required name="email" value="<?= $adminData->email ?>">
                                </div>
                                <div class="form-floating mb-3">
                                    <label>Apodo</label>
                                    <input type="text" class="form-control" required name="nickname" value="<?= $adminData->nickname ?>">
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-warning mt-3 float-right" type="submit">Actualizar informacion</button>
                                </div>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php require_once('view/layout/Footer2.php') ?>