<!DOCTYPE html>
<html <?php language_attributes (); ?>>
    <head>
        <meta charset="<?php bloginfo ('charset'); ?>">
        <title><?php bloginfo ('name'); ?></title>
        <?php wp_head (); ?>
    </head>
    <body <?php body_class (); ?>>
        <!-- Le Contenu de ma Page -->
        <div class="page">

            <p><strong><?php bloginfo ('name'); ?></strong> | <?php bloginfo ('description'); ?></p>

            <!-- TOP HEADER -->
            <div class="topheader">
                <p>Espace Clients :
                    <a href="<?php echo wp_login_url(); ?>">Connexion</a> |
                    <a href=" <?php echo  wp_registration_url();?>">Inscription</a>
                </p>
            </div>

            <!-- HEADER -->
            <header>
                <div class="logo">
                    <a href="index.php">
                        <?php
                          if (function_exists ('the_custom_logo'))
                            if (has_custom_logo ())
                              the_custom_logo();
                            else
                              echo '<img src="'.get_template_directory_uri ().'/images/logo.jpg">';
                        ?>
                    </a>
                </div>
                <!-- nav>ul>li*3>a[href=#] -->
                <nav id="navbar" class="navbar-collapse collapse">
                  <!-- Menu Principal -->
                  <?php
                    wp_nav_menu(array(
                    'theme_location' => 'cmp_menu',
                    "menu_class" => "nav navbar-nav navbar-right",
                    "container" => "ul"
                     ));
                  ?>
                </nav>
            </header>
        </div> <!-- /.page -->
        <!-- PROJECTEUR -->
        <div id="projecteur">
          <?php

            if (has_post_thumbnail () AND get_post_type () == 'page') :
              echo get_the_post_thumbnail ();
            else :
              if (has_header_image ()) : ?>
                <img src="<?php header_image (); ?>"
                  width="<?php echo get_custom_header()->width ?>"
                  alt="Bandeau du Haut">
              <?php else : ?>
                <img src="<?php echo get_template_directory_uri (); ?>/images/bandeau-saint-marc.jpg"
                  alt="Campus Monsieur Propre">
              <?php endif;
            endif;
          ?>
        </div>
