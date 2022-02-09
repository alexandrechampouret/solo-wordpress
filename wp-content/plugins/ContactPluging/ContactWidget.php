<?php

// Notre classe ContactWidget hérite de la classe prédéfinie de wordpress WP_Widget
class ContactWidget extends WP_Widget{

    // Nous définissons une méthode __construct pour initialiser notre parent
    public function __construct(){
        parent::__construct('ContactPlugin', 'Contact', array('description'=>'Affichage des contacts'));
    }

    // Cette méthode contient le contenu du widget : affichage des contacts + formulaire d'ajout
    public function widget($arg, $instance){
        
        // On va chercher les balises qui entourent le widget et qui entourent le titre (qui sont définies dans le thème via register_sidebar())
        echo $arg['before_widget'];
        echo $arg['before_title'];
        echo $arg['after_title'];

        // formulaire d'ajout de contact
        echo '<form method="post" action="">
            <p>
            <label> Ajout d\'un contact : </label>
            <input id="emailContact" name="emailContact" value="" type="email">
            </p>
            <input type="submit">

            </form>';

        echo $arg['after_widget'];

    }


    // cette méthode permet d'afficher le formulaire de modification lors de l'affectation du widget dans une région (apparence>widget)
    public function form($instance){

        // si la valeur à l'indice 'title' de la variable $instance est déclarée et non NULL, alors on accès à cette valeur, autrement ''
        $title = isset($instance['title']) ? $instance['title'] : '';

        echo '<label for ="' . $this->get_field_name('title') . '">' . _e('Title:') . '</label>';
        echo '<input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value"' . $title . '">';
    }

}