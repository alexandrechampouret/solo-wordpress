<!-- get_header() = fonction prédéfinie par wordpress pour faire l'inclusion du header (header.php) -->
<?php get_header(); ?>

<!-- Début de la boucle : s'il y a des posts (contenus : page, articles...) à afficher, on commence une boucle while. Dans cette boucle while, tant qu'il y a des posts, on fait des tours de boucle pour accéder à chaque post. -->
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- Affiche le titre du post en tant que lien vers le permalien du post grâce aux fonctions wordpress the_title() et the_permalink() -->
<h1 class="<?php the_title(); ?> titre_page">  <?php the_title(); ?> </h1>

<p>Ecrit par : <?php the_author(); ?>, le <?php the_date(); ?>.</p>

<!-- Affiche le corps (contenu) du post dans un bloc div grâce à la fonction wordpress the_content() -->
<div class="contenu">
    <?php the_content(); ?>
</div>

<!-- Fin de la boucle while, début du else -->
<?php endwhile; else: ?>

<!-- Message d'erreur en cas de contenu non-trouvé -->
<p>Contenu non trouvé</p>

<!-- Fin de la condition if -->
<?php endif; ?>


<!-- get_footer = fonction prédéfinie par wordpress pour faire l'incusion du footer (footer.php) -->
<?php get_footer(); ?>