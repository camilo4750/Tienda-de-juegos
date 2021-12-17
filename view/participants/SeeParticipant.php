<?php require_once('view/layout/Header2.php') ?>
<?php if (isset($oneParticipant) && is_object($oneParticipant)) : ?>

    <div class="container-fluid">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= baseUrl ?>Participants/view">Ver Tabla</a></li>
            </ol>
        </nav>
        <div class="card">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">INFORMACION GENERAL</h6>

            </div>
            <div class="card-body">
                <h2 class="text-center text-title">Cliente</h2>
                <div class="row">
                    <div class="col-sm-12 col-lg-2">
                        <div class="d-flex align-items-center">
                            <div class="image"> <img src="<?= baseUrl ?>Uploads/profiles/<?= $oneParticipant->imageClient ?>" class="rounded" width="155" height="145"> </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-10">
                        <div class="d-flex align-items-center">
                            <div class="w-100">
                                <h4 class="mb-0 mt-0"><?= $oneParticipant->name . " " . $oneParticipant->surname ?> - <?= $oneParticipant->email ?></h4> <span><?= $oneParticipant->descriptionClient ?></span>
                                <div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">
                                    <div class="d-flex flex-column"> <span class="rating">ID</span> <span class="number3"><?= $oneParticipant->idclient ?></span> </div>
                                    <div class="d-flex flex-column"> <span class="articles">creado:</span> <span class="number1"><?= $oneParticipant->createClient ?></span> </div>
                                    <div class="d-flex flex-column"> <span class="followers">Cliente fijo:</span> <span class="number2"><?= $oneParticipant->client_fixed ?></span> </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h2 class="text-center text-title mt-2">Encuesta</h2>
                <div class="row justify-content-center">
                    <div class="col-10">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Titulo</th>
                                        <th scope="col">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">ID</th>
                                        <td><?= $oneParticipant->idparticipant ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">razón</th>
                                        <td><?= $oneParticipant->reason ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Terminos</th>
                                        <td><?= $oneParticipant->terms ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Telefono</th>
                                        <td><?= $oneParticipant->telephone ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Instalado</th>
                                        <td><?= $oneParticipant->install ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Incrito</th>
                                        <td><?= $oneParticipant->status ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <h2 class="text-center text-title mt-2">Evento</h2>
                <div class="container-fluid p-0">
                    <div class="card border-0 bg-dark text-white">
                        <img src="<?= baseUrl ?>Uploads/events/<?= $oneParticipant->imageEvent ?>" class="card-img" height="550" width="100" alt="...">
                        <div class="fondo">
                            <div class="card-img-overlay mt-5">
                                <h5 class="card-title text-title text-white"><?= $oneParticipant->nameEvent ?></h5>
                                <p class="card-text text-primary2"><?= $oneParticipant->description ?></p>
                                <p class="card-text text-primary2">Fecha Inicio De Inscripciones: <?= $oneParticipant->createEvent ?></p>
                                <p class="card-text text-primary2">Fecha Fin De Inscripcion: <?= $oneParticipant->expires_in ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php require_once('view/layout/Footer2.php') ?>