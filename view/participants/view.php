<?php require_once('view/layout/Header2.php') ?>
<div class="container">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Ver Tabla</a></li>

        </ol>
    </nav>
    <?php if (isset($_SESSION['active']) && $_SESSION['active'] == "exitoso") : ?>
        <div class="row" id="alerta">
            <div class="col-md-12 ">
                <div class=" text-center alert alert-info alert-dismissible fade show" role="alert">
                    <strong>
                        <i class="bi bi-controller"></i>
                        Se ha activado correctamente..!
                    </strong>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if (isset($_SESSION['inactive']) && $_SESSION['inactive'] == "exitoso") : ?>
        <div class="row" id="alerta">
            <div class="col-md-12 ">
                <div class=" text-center alert alert-warning alert-dismissible fade show" role="alert">
                    <strong> <i class="bi bi-controller"></i>
                        Se ha Inactivado correctamente..!</strong>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php utilities::deleteSession() ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">PARTICIPANTES</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="display table responsive table-striped table-bordered" style="width:100%">
                    <thead class="bg-gradient-secondary text-white ">
                        <tr>
                            <th>ID</th>
                            <th>Participante</th>
                            <th>Evento</th>
                            <th>Inscrito</th>
                            <th>Cuartos</th>
                            <th>Semifinal</th>
                            <th>Final</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($Participant = $allParticipants->fetch_object()) : ?>
                            <tr>
                                <td class="w-80"><?= $Participant->idparticipant ?></td>
                                <td><?= $Participant->name . " " . $Participant->surname ?></td>
                                <td><?= $Participant->event ?></td>
                                <?php if ($Participant->status === "Activo") : ?>
                                    <td class="text-success"><?= $Participant->status ?></td>
                                <?php else : ?>
                                    <td class="text-danger"><?= $Participant->status ?></td>
                                <?php endif; ?>
                                <?php if ($Participant->quarters === "Activo") : ?>
                                    <td class="text-success"><?= $Participant->quarters ?></td>
                                <?php else : ?>
                                    <td class="text-danger"><?= $Participant->quarters ?></td>
                                <?php endif; ?>
                                <?php if ($Participant->semifinal === "Activo") : ?>
                                    <td class="text-success"><?= $Participant->semifinal ?></td>
                                <?php else : ?>
                                    <td class="text-danger"><?= $Participant->semifinal ?></td>
                                <?php endif; ?>
                                <?php if ($Participant->final === "Activo") : ?>
                                    <td class="text-success"><?= $Participant->final ?></td>
                                <?php else : ?>
                                    <td class="text-danger"><?= $Participant->final ?></td>
                                <?php endif; ?>
                                <td>
                                    <?php if ($Participant->status === 'Activo') : ?>
                                        <a href="<?= baseUrl ?>Participants/inactiveStatus&id=<?= $Participant->idparticipant  ?>" type="button" class="btn-sm btn-danger mb-1" data-toggle="tooltip" data-placement="top" title="Inactivar Inscripción"><i class="bi bi-person-x-fill"></i></a>
                                    <?php else : ?>
                                        <a href="<?= baseUrl ?>Participants/activeStatus&id=<?= $Participant->idparticipant  ?>" type="button" class="btn-sm btn-success mb-1" data-toggle="tooltip" data-placement="top" title="Activar Inscripción"><i class="bi bi-person-check-fill"></i></a>
                                    <?php endif; ?>
                                    <?php if ($Participant->quarters === 'Activo') : ?>
                                        <a href="<?= baseUrl ?>Participants/inactiveQuarters&id=<?= $Participant->idparticipant  ?>" type="button" class="btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Inactivar Inscripción"><i class="bi bi-dice-4-fill"></i></a>
                                    <?php else : ?>
                                        <a href="<?= baseUrl ?>Participants/activeQuarters&id=<?= $Participant->idparticipant  ?>" type="button" class="btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Activar Inscripción"><i class="bi bi-dice-4-fill"></i></a>
                                    <?php endif; ?>
                                    <?php if ($Participant->semifinal === 'Activo') : ?>
                                        <a href="<?= baseUrl ?>Participants/inactiveSemifinal&id=<?= $Participant->idparticipant  ?>" type="button" class="btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Inactivar Inscripción"><i class="bi bi-dice-5-fill"></i></a>
                                    <?php else : ?>
                                        <a href="<?= baseUrl ?>Participants/activeSemifinal&id=<?= $Participant->idparticipant  ?>" type="button" class="btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Activar Inscripción"><i class="bi bi-dice-5-fill"></i></a>
                                    <?php endif; ?>
                                    <?php if ($Participant->final === 'Activo') : ?>
                                        <a href="<?= baseUrl ?>Participants/inactiveFinal&id=<?= $Participant->idparticipant  ?>" type="button" class="btn-sm btn-danger mb-1" data-toggle="tooltip" data-placement="top" title="Inactivar Inscripción"><i class="bi bi-flag-fill"></i></a>
                                    <?php else : ?>
                                        <a href="<?= baseUrl ?>Participants/activeFinal&id=<?= $Participant->idparticipant  ?>" type="button" class="btn-sm btn-success mb-1" data-toggle="tooltip" data-placement="top" title="Activar Inscripción"><i class="bi bi-flag-fill"></i></a>
                                    <?php endif; ?>
                                    <a href="<?= baseUrl ?>Participants/seeInfoEvent&id=<?= $Participant->idparticipant  ?>" type="button" class="btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Activar Inscripción"><i class="bi bi-eye-fill"></i></a>

                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                    <tfoot>
                        <tr class="bg-gradient-secondary text-white">
                            <th>ID</th>
                            <th>Participante</th>
                            <th>Evento</th>
                            <th>Inscrito</th>
                            <th>Cuartos</th>
                            <th>Semifinal</th>
                            <th>Final</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<?php require_once('view/layout/Footer2.php') ?>