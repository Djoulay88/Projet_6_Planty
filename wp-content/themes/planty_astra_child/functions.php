<?php

    // Action qui permet de charger des scripts dans notre thème
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles(){
    // Chargement du style.css du thème parent Astra
wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    // Chargement du css/theme.css pour nos personnalisations
wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));
    // Chargement du css/responsive.css pour les différentes tailles d'écran
wp_enqueue_style('responsive', get_stylesheet_directory_uri() . '/css/responsive.css', array(), filemtime(get_stylesheet_directory() . '/css/responsive.css'));
    // Chargement du css/shortcodes/vignette-saveur.css pour les shortcodes vignette saveur
wp_enqueue_style('vignette-saveur-shortcode', get_stylesheet_directory_uri() . '/css/shortcodes/vignette-saveur.css', array(), filemtime(get_stylesheet_directory() . '/css/shortcodes/vignette-saveur.css'));
    // Chargement du css/formulaires.css pour les personnalisations des formulaires
    wp_enqueue_style('formulaires', get_stylesheet_directory_uri() . '/css/formulaires.css', array(), filemtime(get_stylesheet_directory() . '/css//formulaires.css'));
}



                        /*--------------Shortcodes---------------*/


    //Ajout du shortcode qui permet d'afficher la vignette saveur de la page d'accueil
add_shortcode('vignette-saveur-accueil', 'vignette_saveur_accueil_func');

    // Création de la structure html du widget
function vignette_saveur_accueil_func($atts)
{
    //Je récupère les attributs mis sur le shortcode
    $atts = shortcode_atts(array(
        'src' => '',
        'titre' => 'Titre'
    ), $atts, 'vignette-saveur-accueil');

    //Je commence à récupéré le flux d'information
    ob_start();

    if ($atts['src'] != "") {
        ?>

        <div class="vignette-saveur-accueil" style="background-image: url(<?= $atts['src'] ?>)">
            <p class="titre"><?= $atts['titre'] ?></p>
        </div>

        <?php
    }

    //J'arrête de récupérer le flux d'information et le stock dans la fonction $output
    $output = ob_get_contents();
    ob_end_clean();

    return $output;
}

    //Ajout du shortcode qui permet d'afficher la vignette saveur de la page d'accueil
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

    // Retrait du spinner du formulaire de commande

add_filter( 'wpcf7_load_js', '__return_false' );

    // Mise en place du hook d'affichage du lien Admin dans le menu

function ajouter_lien_si_connecte($items, $args) {
    if (is_user_logged_in() && ($args->theme_location == 'primary' || $args->theme_location == 'mobile_menu')) {
        // Ajoutez ici le lien que vous souhaitez afficher dans le Menu Principal
        $nouvel_item = '<li><a class="hook-admin" href="'.site_url().'/wp-admin/">Admin</a></li>';
        
        // Ajoutez le nouvel item au début de la liste des éléments du menu
        $items = $items . $nouvel_item;
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'ajouter_lien_si_connecte', 10, 2);

    // Inclure des shortcodes directement dans l'extension Contact Form 7

add_filter( 'wpcf7_form_elements', 'mycustom_wpcf7_form_elements' );

function mycustom_wpcf7_form_elements( $form ) {
    $form = do_shortcode( $form );

    return $form;
}

/** Erreur constatée grâce Query Monitor
 * 
 * Proper ob_end_flush() for all levels
 *
 * This replaces the WordPress `wp_ob_end_flush_all()` function
 * with a replacement that doesn't cause PHP notices.
 */
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );
add_action( 'shutdown', function() {
   while ( @ob_end_flush() );
} );

