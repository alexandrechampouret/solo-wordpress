<?php

// ------------ CREATION DE WIDGETS

// Ceci est un hook, on s'accroche à la fonction prédéfinie de wordpress widgets_init() et on y intègre les infos qu'on va définir dans notre fonction personnalisée monthemeperso_init_sidebar()
add_action('widgets_init', 'monthemeperso_init_sidebar');

// Notre fonction personnalisée où on définit nos espaces de widgets (qui seront ensuite positionnés sur les templates)
function monthemeperso_init_sidebar(){
    // register_sidebar() = fonction wordpress permettant de créer un emplacement de widget
    register_sidebar(array(
        'name' => __('haut gauche', 'monthemeperso'),
        'id' => 'haut-gauche',
        'description' => __('Région en haut à gauche', 'monthemeperso')
    ));

    register_sidebar(array(
        'name' => __('haut droit', 'monthemeperso'),
        'id' => 'haut-droit',
        'description' => __('Région en haut à droite', 'monthemeperso')
    ));

    register_sidebar(array(
        'name' => __('entête', 'monthemeperso'),
        'id' => 'entete',
        'description' => __('Région d\'entête', 'monthemeperso')
    ));

    register_sidebar(array(
        'name' => __('bas gauche', 'monthemeperso'),
        'id' => 'bas-gauche',
        'description' => __('Région en bas à gauche', 'monthemeperso')
    ));

    register_sidebar(array(
        'name' => __('bas droit', 'monthemeperso'),
        'id' => 'bas-droit',
        'description' => __('Région en bas à droite', 'monthemeperso')
    ));


}

// ------------- CREATION EMPLACEMENT DE MENUS ----------------

add_action('init', 'mtp_mes_menus');
function mtp_mes_menus()
{
    register_nav_menu('menu-header', __('Menu header'));
}