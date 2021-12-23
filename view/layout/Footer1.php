<div class="container">
    <footer class="py-3 my-4">
        <h3 class="text-footer text-center">QUICK SHOPPING GAME</h3>
        <ul class="nav justify-content-center">
            <li><a href=""><i class="bi bi-xbox mx-2"></i></a></li>
            <li><a href=""><i class="bi bi-playstation  mx-2"></i></a></li>
            <li><a href=""><i class="bi bi-nintendo-switch  mx-2"></i></a></li>
            <li><a href=""><i class="bi bi-joystick mx-2"></i></a></li>
        </ul>
        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <?php $CATEGORIES = utilities::allCategory(); ?>
            <?php while ($CATEGORY = $CATEGORIES->fetch_object()) : ?>
                <li class="nav-item"><a href="#" class="nav-link px-2 text-muted"><?= $CATEGORY->name ?></a></li>
            <?php endwhile; ?>
        </ul>


        <div class="text-center">
            <p class="text3 text-dark">Camilo Alarcon - Desarrollador Full Stack</p>
            <h6 class="text-dark text3">&copy;2021</h6>
        </div>

    </footer>
</div>
<script src="<?= baseUrl ?>js/scripts.js?v=<?php echo time(); ?>"></script>
<script src="<?= baseUrl ?>node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= baseUrl ?>node_modules/jquery/dist/jquery.min.js"></script>


</body>

</html>