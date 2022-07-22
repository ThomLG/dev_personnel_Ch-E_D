<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php wp_head(); ?>
    <!--⚠ Très important !! Permet de déclencher l'action wp_head.
Sans l'appel de cette fonction, les fichiers CSS ne seront pas chargés ! -->
</head>

<body <?php body_class(); ?>>
    <!--Affiche les classes CSS de la page en cours. WP met par défaut
un certain nombre de classes en fonction des situations : si on est sur la home,
si on est connecté, etc. -->
    <?php wp_body_open(); ?>

    <!-- Vérifier si un menu a été associé à l'emplacement menu-top dans l'admin -->
    <?php if (has_nav_menu('menu-top')) : ?>

        <!-- Le walker -->
        <nav class="navbar navbar-expand-md navbar-light bg-light" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#bs-example-navbar-collapse-1" aria-controls="bs-example-navbar-collapse-1" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'your-themeslug'); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!--*si j’ai un logo je l’affiche, sinon, je mets le nom du site -->
                <a class="navbar-brand" href="#">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <?php bloginfo('name'); ?>
                    <?php endif; ?>
                </a>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'menu-top',
                    'depth' => 1,
                    'container' => 'nav',
                    'container_class' => 'collapse navbar-collapse',
                    'container_id' => 'bs-example-navbar-collapse-1',
                    'menu_class' => 'nav navbar-nav',
                    'fallback_cb' => 'WP_Bootstrap_Navwalker::fallback',
                    'walker' => new WP_Bootstrap_Navwalker(),
                ));
                ?>
            </div>
        </nav>

    <?php endif; ?>