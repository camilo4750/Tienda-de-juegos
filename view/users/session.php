<main id="SitioPrincipal">
    <div class="row m-0">
        <div class="col-md-9 offset-md-3 px-0">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="card mt-8 mb-3 border-0">
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-md-6 p-0">
                                        <div class="card border-color-blue">
                                            <img src="<?= baseUrl ?>assets/img/ADMIN.jpg" class="card-img-top" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-0">
                                        <div class="card p-4 border-0 text-center border-color-blue">
                                            <h3 class="text-title">Administrador</h3>
                                            <form action="<?= baseUrl ?>Users/login" method="POST">
                                                <div class="form-floating mb-3">
                                                    <input type="email" class="form-control" id="floatingInput" required name="email" placeholder="name@example.com">
                                                    <label for="floatingInput">Email</label>
                                                </div>
                                                <div class="form-floating">
                                                    <input type="password" class="form-control" id="floatingPassword" required name="password" placeholder="Password">
                                                    <label for="floatingPassword">Password</label>
                                                </div>

                                                <div class="d-grid gap-2">
                                                    <button class="btn btn-fixed mt-3" type="submit">Ingresar</button>
                                                </div>
                                            </form>
                                            <div class="d-grid gap-2">
                                                <a href="#" class="btn btn-a mt-2 mb-2" type="button">Recuperar contraseña</a>
                                            </div>
                                            <?php if (isset($total) && $total->total == 1) : ?>
                                                <a href="<?= baseUrl ?>Products/index" class="btn btn-c">Volver</a>
                                            <?php elseif (isset($total) && $total->total == 0) : ?>
                                                <!-- Button trigger modal -->
                                                <div class="d-grid gap-2">
                                                    <button type="button" class="btn btn-b" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        Registrate Aqui
                                                    </button>
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Ingresa tus datos</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="<?= baseUrl ?>users/save" method="POST">
                                                                        <div class="form-floating mb-3">
                                                                            <input type="text" class="form-control" placeholder="Nombre" required name="name">
                                                                            <label for="floatingInput">Nombre</label>
                                                                        </div>
                                                                        <div class="form-floating mb-3">
                                                                            <input type="text" class="form-control" placeholder="Apellido" require name="surname">
                                                                            <label for="floatingInput">Apellido</label>
                                                                        </div>
                                                                        <div class="form-floating mb-3">
                                                                            <input type="email" class="form-control" placeholder="Email" require name="email">
                                                                            <label for="floatingInput">Email</label>
                                                                        </div>
                                                                        <div class="form-floating mb-3">
                                                                            <input type="password" class="form-control" placeholder="Password" requier name="password">
                                                                            <label for="floatingInput">Password</label>
                                                                        </div>
                                                                        <div class="d-grid gap-2">
                                                                            <button class="btn btn-fixed mt-3" type="submit" id="button1">Registrar</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if (isset($_SESSION['save']) && $_SESSION['save'] = "exitoso") : ?>
                        <div class="row" id="mydiv">
                            <div class="col-md-4 offset-md-8">
                                <div class=" alert alert-success alert-dismissible fade show" role="alert">
                                    <strong><i class="bi bi-person-check-fill"></i> Felicidades..!</strong> El usuario se ha creado correctamente.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($_SESSION['noIdentity']) && $_SESSION['noIdentity'] = "error1") : ?>
                        <div class="row" id="mydiv">
                            <div class="col-md-4 offset-md-8">
                                <div class=" alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong><i class="bi bi-person-x-fill"></i> Error</strong> Correo o contraseña se encuentran incorrectos
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php utilities::deleteSession(); ?>
                </div>
            </div>
        </div>
    </div>
</main>