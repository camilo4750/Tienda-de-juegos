<?php require_once('view/layout/Header2.php') ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card p-3">
                <?php while ($PRODUCT = $allOnStock->fetch_object()) : ?>
                    <div class="col-sm-9 col-xl-3 col-md-6 ">
                        <div class="card shadow p-2 mb-2 justify-content-center align-items-center border-product" style="height: 450px;">
                            <div>
                                <img src="<?= baseUrl ?>Uploads/products/<?= $PRODUCT->image ?>" class="bd-placeholder-img rounded shadow" width="120" height="170" alt="">
                            </div>
                            <h3 class="lh-1 mt-1 text-center"><?= $PRODUCT->name ?></h3>
                            <div class="text-center">
                                <h5 class="text-warning">$<?= number_format($PRODUCT->price) ?></h5>
                                <h4 class="text-danger">Disponibles: <?= $PRODUCT->stock ?></h4>
                            </div>
                            <p><?= $PRODUCT->descriptionCor ?>...</p>
                            <div class="ms-auto">
                                <a href="<?= baseUrl ?>Products/edit&id=<?= $PRODUCT->idproduct ?>" class="btn btn-a" type="button">ACTUALIZAR</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>
<?php require_once('view/layout/Footer2.php') ?>