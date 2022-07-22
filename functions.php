<?php

/**
 * Register Custom Navigation Walker
 */
function register_navwalker() // Un walker permet de gérer plus finement le code de la fonction wp_nav_menu
{
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');




/*Style CSS et JS*/

add_action('wp_enqueue_scripts', 'mindfulness_evolution_enqueue_styles');
function mindfulness_evolution_enqueue_styles()
{
     // Chargement des JavaScripts
     wp_enqueue_script(
        'bootstrap-js',
        get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js',
        [],
        wp_get_theme()->get('Version'),
        true
    );

    wp_enqueue_style(
        'theme-style',
        get_template_directory_uri() . '/style.css',
        ['bootstrap-css'],
        wp_get_theme()->get('Version')
    );

    wp_enqueue_style(
        'bootstrap-css',
        get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css',
        [],
        wp_get_theme()->get('Version')
    );

}


/**
 * Enregistrer les emplacements de menu
 */
add_action('after_setup_theme', 'mindfulness_evolution_register_menu');
function mindfulness_evolution_register_menu()
{
    register_nav_menu('menu-top', 'Menu Principal');
}


/**
 * Activer des fonctionnalités de WordPress
 */

add_action('after_setup_theme', 'mindfulness_evolution_add_theme_support');
function mindfulness_evolution_add_theme_support()
{
    add_theme_support('custom-logo', [
        'height' => 100, // 100 est le maximum
        'width' => 400,
        'flex-width' => true, // Permet de redimensionner la largeur
    ]);
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script')); //générer des balises et attributs HTML5
    add_theme_support('title-tag'); // Générer la balise <title> dans le head
    add_theme_support('post-thumbnails'); //activer les images à la une
    add_theme_support('custom-header'); //activer la personnalisation de l'image du header
    add_theme_support( 'custom-background'); //Permet d'ajouter une image arrière plan 
}
