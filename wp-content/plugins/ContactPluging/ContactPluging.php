<?php 

/*
    Plugin Name: Contact Plugin
    Plugin URI: http://
    Description: Plugin de gestion de contacts via widget
    Version: 1.0
    Author: Magali Milbergue
    Author URI: http://
    License: -
*/

// On donne à wordpress les infos sur le plugin grâce aux commentaires ci-dessus


class ContactPlugin{

    // La méthode constructeur s'éxecute en premier lors de l'instanciation
    public function __construct()
    {
        // La fonction plugin_dir_path récupère le chemin vers notre dossier d'extension en s'appuyant sur le chemin vers ce fichier (donné grâce à __FILE__). Grâce à ce chemin, on inclus le fichier ContactWidget.php
        include_once plugin_dir_path(__FILE__).'/ContactWidget.php';

        // On fait un hook sur admin_menu() pour ajouter un item de menu dans le backoffice. (On dit qu'on veut exécuter la méthode admin_menu() sur $this (cet objet))
        add_action('admin_menu', array($this, 'BackOfficeMenu'));

        //Nous demandons à wordpress de prendre en compte la méthode sauvegardeContact()
        add_action('wp_loaded', array($this, 'sauvegardeContact'));

        //Nous appelons widgets_init() (qui initialise les widgets) et enregistrons un nouveau widget grâce à register_widget() à qui nous demandons de prendre en compte la méthode personnalisée ContactWidget()
        add_action('widgets_init',function(){register_widget('ContactWidget');} );

        // Création d'un shortcode, deux arguments : nom du shortcode et méthode à éxécuter
        add_shortcode('listingContact', array($this, 'affichageShortCode'));

        // Permet de charger et d'enregistrer les paramétrages
        add_action('admin_init', array($this, 'registerSettings'));

        // On exécute la fonction install() lors de l'activation du plugin pour la création des tables sql dans la BDD
        $this->install();
    }


    // Cette fonction est exécutée en cas d'installation et d'activation du plugin
    public static function install(){

        // On importe une variable globale dans un espace local
        global $wpdb;

        // Cette ligne permet de créer notre table contact dans la BDD
        $wpdb->query("CREATE TABLE IF NOT EXISTS {$wpdb->prefix}contact(id INT AUTO_INCREMENT PRIMARY KEY, email VARCHAR(255) NOT NULL);");
    }

    // La fonction affichageShortCode s'éxécutera quand l'affichage du shortcode sera demandé
    public function affichageShortCode(){
        // on importe de nouveau la variable dans le local
        global $wpdb;

        // requête de sélection nous permettant de récupérer le contenu de la table Contact
        $row = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}contact");

        // On affiche notre contenu de table dans un tableau html

        echo '<table border="1">';
            echo '<tr><th>id</th><th>email</th></tr>';

            // on fait une boucle foreach qui nous permet à chaque tour de boucle d'accéder à une ligne de valeur de notre table
            foreach($row AS $valeur){
                // à chaque tour de boucle (chaque ligne de la table visitée) on génère une ligne du tableau html
                echo '<tr>';
                // Dans cette ligne on va chercher l'id contenu dans la ligne de la table de la BDD dans laquelle nous nous trouvons et l'afficher dans une cellule de notre tableau
                    echo '<td>' . $valeur->id . '</td>';
                // Dans cette ligne on va chercher l'email contenu dans la ligne de la table de la BDD dans laquelle nous nous trouvons et l'afficher dans une cellule de notre tableau
                    echo '<td>' . $valeur->email . '</td>';
                echo '</tr>';
            }

        echo '</table>';
    }

    // Cette méthode supprime la table contact en cas de désinstallation du plugin
    public static function uninstall(){
        global $wpdb;

        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}contact;");
    }

    // Cette méthode ajoute des liens de menu dans le backoffice
    public function BackOfficeMenu(){

        // add_menu_page() = fonction worpdress qui ajoute une rubrique à la colonne de gauche et précise quelle sera la méthode à éxécuter pour définir l'affichage : BackOfficeGestion()
        add_menu_page('Notre Gestion', 'Gestion', 'manage_options', 'ContactPlugin', array($this, 'BackOfficeGestion'));

        // on ajoute une sous-rubrique dans la colonne et on précise quelle sera la méthode à utiliser pour l'affichage : BackOfficeAffichage()
        add_submenu_page('ContactPlugin', 'Affichage des contacts', 'Affichage des contacts', 'manage_options', 'affichageContact', array($this, 'BackOfficeAffichage'));

    }


    // Méthode qui gère l'affichage de notre page de menu
    public function BackOfficeGestion(){
        // get_admin_page_title() = fonction native à wordpress qui récupère le titre défini dans le 1er argument de la fonction add_menu_page()
        echo '<h1>' . get_admin_page_title() . '</h1>';

        echo '<form method="post" action="options.php">';
            settings_fields('parametres');
            echo "<label> Ajout d'un contact : </label>";
            echo '<input type="text" name="emailContact" value="' . get_option('emailContact') . '">';
            submit_button();
        echo '</form>';

    }

    // Méthode qui gère l'affichage de notre sous-page de menu
    public function BackOfficeAffichage(){
        global $wpdb;

        echo '<h1> Backoffice - Affichage des contacts </h1>';

        echo get_admin_page_title();

        // requête de sélection nous permettant de récupérer le contenu de la table Contact
        $row = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}contact");

        // On affiche notre contenu de table dans un tableau html
        echo '<table border="1">';
            echo '<tr><th>id</th><th>email</th></tr>';

            // on fait une boucle foreach qui nous permet à chaque tour de boucle d'accéder à une ligne de valeur de notre table
            foreach($row AS $valeur){
                // à chaque tour de boucle (chaque ligne de la table visitée) on génère une ligne du tableau html
                echo '<tr>';
                // Dans cette ligne on va chercher l'id contenu dans la ligne de la table de la BDD dans laquelle nous nous trouvons et l'afficher dans une cellule de notre tableau
                    echo '<td>' . $valeur->id . '</td>';
                // Dans cette ligne on va chercher l'email contenu dans la ligne de la table de la BDD dans laquelle nous nous trouvons et l'afficher dans une cellule de notre tableau
                    echo '<td>' . $valeur->email . '</td>';
                echo '</tr>';
            }

        echo '</table>';
    }


    // méthode qui s'exécute pour enregistrer un contact
    public function sauvegardeContact(){

        // Si le champ a été rempli, nous l'insérons dans la BDD
        if(!empty($_POST['emailContact'])){
            global $wpdb;
            $wpdb->insert("{$wpdb->prefix}contact", array('email' => $_POST['emailContact']));
        }
    }

    // fonction qui permet d'enregistrer le paramétrage
    public function registerSettings(){
        register_setting('parametres', 'emailContact');
    }

}

// On instancie la classe
new ContactPlugin();