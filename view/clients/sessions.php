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
                                            <img src="<?= baseUrl ?>assets/img/gaming.jpg" class="img-fluid" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-0">
                                        <div class="card p-4 border-0 text-center border-color-blue">
                                            <h3 class="text-title">Iniciar Session</h3>
                                            <form action="<?= baseUrl ?>Users/save">
                                                <div class="form-floating mb-3">
                                                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                                    <label for="floatingInput">Email address</label>
                                                </div>
                                                <div class="form-floating">
                                                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                                    <label for="floatingPassword">Password</label>
                                                </div>

                                                <div class="d-grid gap-2">
                                                    <button class="btn btn-fixed mt-3" type="submit">Ingresar</button>
                                                </div>
                                                <div class="d-grid gap-2">
                                                    <button class="btn btn-a mt-2" type="button">Recuperar contraseña</button>
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
                                            <form>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" placeholder="Nombre">
                                                    <label for="floatingInput">Nombre</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" placeholder="Apellido">
                                                    <label for="floatingInput">Apellido</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="email" class="form-control" placeholder="Email">
                                                    <label for="floatingInput">Email</label>
                                                </div>
                                                <div class="form-floating mb-3">
                                                    <input type="email" class="form-control" placeholder="Password">
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
        </div>
    </div>
</main>