<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= baseUrl ?>node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= baseUrl ?>node_modules/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= baseUrl ?>assets/css/style.css?v=<?php echo time(); ?>">
    <title>Document</title>
</head>

<body>
    <?php if (isset($_SESSION['Admin'])) : ?>
        <?php unset($_SESSION['Admin']) ?>
    <?php endif; ?>
    <nav class="navbar navbar-expand-xl fixed-top nav-black" id="menu">
        <div class="container-fluid">
            <a class="navbar-brand text-title-menu" href="<?= baseUrl ?>Products/index">Quick Shopping Game</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="bi bi-card-list fs-1 "></span>
            </button>
            <div class="collapse navbar-collapse float-left" id="navbarScroll">
                <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 150px;">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= baseUrl ?>Clients/sessions">Iniciar Session</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= baseUrl ?>Products/index">Home</a>
                    </li>
                    <?php $CATEGORIES = utilities::allCategory() ?>
                    <?php while ($CATEGORY = $CATEGORIES->fetch_object()) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= baseUrl ?>Products/allCategory&id=<?= $CATEGORY->idcategory ?>"><?= $CATEGORY->name ?></a>
                        </li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>
    </nav>
    <script src="https://unpkg.com/scrollreveal"></script>