<?php require_once('View/layout/Header1.php'); ?>
<?php if (isset($_SESSION['User'])  && $_SESSION['User']->idclient === $_SESSION['User']->idclient) : ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-2">
                <div class="card mt-7 shadow">
                    <div class="card border-0 p-1">
                        <a href="<?= baseUrl ?>Cart/listProducts" class="btn btn-a mt-1 fs-6 p-0">VER CARRITO</a>
                        <?php $stats = utilities::statsCart(); ?>
                        <table class="table table-hover table-bordered mt-1">
                            <thead>
                                <tr>
                                    <th scope="col">Productos</th>
                                    <th scope="col">Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><?= $stats['countProducts'] ?></th>
                                    <td><?= $stats['priceTotal'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-10">
                <div class="card mt-7 ">
                    <div class="card-body p-4">
                        <h2>Datos de envio</h2>
                        <p>"Estos datos son de suma importancia procura no equivocarte"</p>
                        <form action="<?= baseUrl ?>Cart/realizedBuy" method="POST">
                            <div class="row g-2">
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="name" required placeholder="solicitante">
                                        <label for="floatingInput">Confirmar nombre completo del solicitante</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="floatingInput" name="document" required placeholder="documento">
                                        <label for="floatingInput">Documento del solicitante</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2">
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="city" required placeholder="ciudad">
                                        <label for="floatingInput">Ciudad</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" name="direction" required placeholder="residencia">
                                        <label for="floatingInput">Direccion de residencia</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="floatingInput" name="telephone" required placeholder="telefono">
                                        <label for="floatingInput">Numero telefonico</label>
                                    </div>
                                </div>
                            </div>
                            <div class="d-grid gap-2 mx-5">
                                <button type="submit" class="btn btn-b">CONFIRMAR COMPRA</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <div class="card mt-7 ">
                    <div class="card-header ">
                        <h1 class="text-title text-center text-danger">NO TIENES PERMISOS DE USUARIO PARA ESTE APARTADO....!</h1>
                        <i class="bi bi-exclamation-octagon d-flex justify-content-center text-danger" style="font-size: 150px;"></i>
                    </div>
                    <div class="car-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php require_once('view/layout/Footer1.php'); ?>