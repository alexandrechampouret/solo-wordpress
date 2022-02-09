<!-- Permet de retrouver la barre d'administration coté front -->
<?php wp_footer(); ?>



</div>
<footer class="container-fluid ">
    <div class="row ">
        <div class="col-md-6 bas-gauche text-center pt-5">
        <?php dynamic_sidebar('bas-gauche'); ?>
        </div>
        <div class="col-md-6 bas-droit d-flex align-items-center justify-content-around ">
        <?php dynamic_sidebar('bas-droit'); ?>
        </div>
    </div>
</footer>



    <!--BOOTSTRAP JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>