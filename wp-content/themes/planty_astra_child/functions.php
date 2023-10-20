<?php

                        /*--------------Hooks---------------*/

    /* Déclaration des scripts du thème enfant - Hook de type action */

function theme_enqueue_styles(){
        // Chargement du style.css du thème parent Astra
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
        // Chargement du css/theme.css pour nos personnalisations
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
        // Chargement du css/responsive.css pour les différentes tailles d'écran
    wp_enqueue_style('responsive', get_stylesheet_directory_uri() . '/css/responsive.css', array(), filemtime(get_stylesheet_directory() . '/css/responsive.css'));
        // Chargement du css/shortcodes/vignette-saveur.css pour les shortcodes vignette saveur
    wp_enqueue_style('vignette-saveur-shortcode', get_stylesheet_directory_uri() . '/css/vignette-saveur.css', array(), filemtime(get_stylesheet_directory() . '/css/vignette-saveur.css'));
        // Chargement du css/formulaires.css pour les personnalisations des formulaires
    wp_enqueue_style('formulaires', get_stylesheet_directory_uri() . '/css/formulaires.css', array(), filemtime(get_stylesheet_directory() . '/css//formulaires.css'));
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

    /* Header - Hook "Admin" de type filtre */

function ajouter_lien_si_connecte($items, $args) { // Fonction récupérée dans la documentation technique de WP
    if (is_user_logged_in() && ($args->theme_location == 'primary' || $args->theme_location == 'mobile_menu')) { // Si l'utilisateur est connecté à WordPress et qu'il y a un menu de navigation (primaire ou hamburger) :
        $nouvel_item = '<li><a class="hook-admin" href="'.site_url().'/wp-admin/">Admin</a></li>'; // Ajout du lien vers l'interface d'administration dans la liste du menu de navigation
        $items = $items . $nouvel_item; // Prise en compte du nouveau lien et réorganisation visuelle
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'ajouter_lien_si_connecte', 10, 2); // 10 = priorité élevée ; 2 = nombre d'arguments dans la fonction

    /* Page Commander - Hook "Shortcode pour CF7" de type filtre */

function mycustom_wpcf7_form_elements( $form ) { // Ajout de la fonctionnalité shortcode à l'intérieur d'un formulaire de contact
    $form = do_shortcode( $form );
    return $form;
}
add_filter( 'wpcf7_form_elements', 'mycustom_wpcf7_form_elements' );

                        /*--------------Shortcodes---------------*/

/* Page d'accueil */

function vignette_saveur_accueil_func($atts) {

    $atts = shortcode_atts(array(
        'src' => '',
        'titre' => 'Titre'
    ), $atts, 'vignette-saveur-accueil');


    ob_start();

    if ($atts['src'] != "") {
        ?>
        <div class="vignette-saveur-accueil" style="background-image: url(<?= $atts['src'] ?>)">
            <p class="titre"><?= $atts['titre'] ?></p>
        </div>
        <?php
    }
    $output = ob_get_contents();

    ob_end_clean();

    return $output;
}

add_shortcode('vignette-saveur-accueil', 'vignette_saveur_accueil_func'); //Ajout du shortcode qui permet d'afficher la vignette saveur de la page d'accueil

/* Page Commander */

    //Ajout du shortcode qui permet d'afficher la vignette saveur de la page Commander
    add_shortcode('vignette-saveur-commande', 'vignette_saveur_commande_func');

    // Création de la structure html du widget
function vignette_saveur_commande_func($atts)
{
    //Je récupère les attributs mis sur le shortcode
    $atts = shortcode_atts(array(
        'src' => '',
        'titre' => 'Titre'
    ), $atts, 'vignette-saveur-commande');

    //Je commence à récupéré le flux d'information
    ob_start();

    if ($atts['src'] != "") {
        ?>

        <div class="vignette-saveur-commande" style="background-image: url(<?= $atts['src'] ?>)">
            <p class="titre"><?= $atts['titre'] ?></p>
        </div>

        <?php
    }

    //J'arrête de récupérer le flux d'information et le stock dans la fonction $output
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}


