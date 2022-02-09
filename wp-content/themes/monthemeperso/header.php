<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- bloginfo() = fonction native à wordpress qui permet d'accéder aux infos du site (qui peuvent être paramétrées dans le backoffice), il y a plusieurs arguments possibles -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- On affiche comme title le titre de la page (the_title()) puis le titre du site (bloginfo('name')) -->
    <title><?php the_title(); ?> - <?php bloginfo('name'); ?> </title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <!-- TYPO   -->
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Comforter&family=Supermercado+One&display=swap" rel="stylesheet">

    <!-- CSS PERSONNALISÉ -->
    <!-- On automatise le chemin vers le css grâce à bloginfo -->
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css">

    <!-- wp_head() = fonction native à wordpress qui permet de générer tout un tas de lignes de codes dont wordpress a besoin pour fonctionner correctement -->
    <?php wp_head(); ?>

</head>

<!-- body_class() = fonction native à wordpress qui génère des classes dont wordpress a besoin dans la balise body -->

<body <?php body_class(); ?>>


    <header class="container-fluid ">
        <div class="row p-3 first-row">
            <div class="col-md-9 haut-gauche d-md-flex align-items-center justify-content-around ">
                <?php dynamic_sidebar('haut-gauche'); ?>
            </div>
            <div class="col-md-3 haut-droit d-flex align-items-center justify-content-center">
            <?php dynamic_sidebar('haut-droit'); ?>
            </div>
        </div>

        <div class="row">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav w-100">
                            <?php wp_nav_menu(array('theme_location' => 'menu-header', 'container_class' => 'menu-header'));?>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div class="row ">
            <div class="col-md-12 entete p-0">
            <?php dynamic_sidebar('entete'); ?>
            </div>
        </div>
    </header>

    <div class="container p-5">

    