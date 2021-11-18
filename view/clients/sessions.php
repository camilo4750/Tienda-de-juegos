<?php require_once('View/layout/Header1.php'); ?>
<div class="container">
    <div class="row align-items-center">
        <div class="col-md-12">
            <div class="card mt-8 mb-3 border-0">
                <?php if (isset($_SESSION['save']) && $_SESSION['save'] == "exitoso") : ?>
                    <div class="row" id="mydiv">
                        <div class="col-md-12 ">
                            <div class=" alert alert-success alert-dismissible fade show" role="alert">
                                <strong><i class="bi bi-person-check-fill"></i> Felicidades..!</strong> El usuario se ha creado correctamente.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if (isset($_SESSION['noIdentity']) && $_SESSION['noIdentity'] = "error1") : ?>
                    <div class="row" id="mydiv">
                        <div class="col-md-12">
                            <div class=" alert alert-danger alert-dismissible fade show" role="alert">
                                <strong><i class="bi bi-person-x-fill"></i> Error</strong> Correo o contraseña se encuentran incorrectos
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php utilities::deleteSession(); ?>
                <div class="card-body p-0">
                    <div class="row">

                        <div class="col-md-6 p-0">
                            <div class="card border-color-blue">
                                <img src="<?= baseUrl ?>assets/img/gaming.jpg" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col-md-6 p-0">
                            <div class="card p-4 border-0 text-center border-color-blue">
                                <h3 class="text-title">Iniciar Session Cliente</h3>
                                <form action="<?= baseUrl ?>Clients/login" method="POST">
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="floatingInput" required name="email" placeholder="Email">
                                        <label for="floatingInput">Email</label>
                                    </div>
                                    <div class="form-floating">
                                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required name="password">
                                        <label for="floatingPassword">Password</label>
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button class="btn btn-fixed mt-3" type="submit">Ingresar</button>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-a mt-2" type="button">Recuperar contraseña</button>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <a href="<?= baseUrl ?>Users/session" class="btn btn-c mt-2" type="button">ADMIN</a>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="card p-3">
                <div class="header text-title text-center mb-3">Deseas hacer parte de nuesta comunidad, no esperes mas y registrate</div>
                <!-- Button trigger modal -->
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
                                <form action="<?= baseUrl ?>Clients/save" method="POST" enctype="multipart/form-data">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" placeholder="Nombre" required name="name">
                                        <label for="floatingInput">Nombres</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" placeholder="Apellidos" required name="surname">
                                        <label for="floatingInput">Apellidos</label>
                                    </div>

                                    <label for="">Foto perfil:</label>
                                    <div class="form-control mb-3">
                                        <input type="file" class="form-control" required name="image">
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" placeholder="Descripcion" required name="description">
                                        <label for="floatingInput">Descripcion</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" placeholder="Email" required name="email">
                                        <label for="floatingInput">Email</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" placeholder="password" required name="password">
                                        <label for="floatingInput">Password</label>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-fixed mt-3" type="submit">Registrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('view/layout/Footer1.php'); ?>