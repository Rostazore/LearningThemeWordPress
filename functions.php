<?php

// Ajout des styles.
function cmp_enqueue_styles ()
{
  // Ajout de normalize.css.
	wp_enqueue_style('cmp_normalisation', get_template_directory_uri () . '/normalize.css', false);

  // Ajout de style.css.
  wp_enqueue_style('cmp_style', get_stylesheet_uri (), false);

  // Font Awesome
  wp_enqueue_style('fontawesome-cdn', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array (), '4.7.0');

  // Google font
  wp_enqueue_style('police_lato', 'fonts.googleapis.com/css?family=Lato', false);
}

// Ajout des scripts.
function cmp_enqueue_scripts ()
{

}
add_action ('wp_enqueue_scripts', 'cmp_enqueue_styles');
add_action ('wp_enqueue_scripts', 'cmp_enqueue_scripts');

// Logo personnalisable.
function cmp_custom_logo_setup () {
    $defaults = array(
        'height'      => 100,
        'width'       => 100,
        'flex-height' => false,
        'flex-width'  => false,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support ('custom-logo', $defaults);
}
add_action('after_setup_theme', 'cmp_custom_logo_setup');

// Créer un emplacement de menu.
function enregistrer_cmp_menu ()
{
  register_nav_menu ('cmp_menu', 'Menu du Haut');
}
add_action ('init', 'enregistrer_cmp_menu');

// Image de l'en-tête personnalisable.
function cmp_custom_header_setup ()
{
  $arguments = array (
    'width'         => 1600,
    'height'        => 400,
    'default-image' => get_template_directory_uri () . '/images/bandeau-saint-marc.jpg',
    'uploads'       => true,
  );
  add_theme_support ('custom-header', $arguments);
}
add_action ('init', 'cmp_custom_header_setup');

register_default_headers ( array (
  'bandeauDuHaut' => array (
    'url' => '%s/images/bandeauDuHaut.jpg',
    'thumbnail_url' => '%s/images/bandeauDuHaut.jpg',
    'description' => __('Proposition 1', 'isem')
  ),
  'bandeauCMP' => array (
    'url' => '%s/images/bandeau-saint-marc.jpg',
    'thumbnail_url' => '%s/images/bandeau-saint-marc.jpg',
    'description' => __('Proposition 2', 'cmp')
  )
));

// Custom background.
add_theme_support ('custom-background');

// Création d'un custom post type.
add_action ('init', 'create_post_type');
function create_post_type ()
{
	register_post_type ('accueil-news',  array (
		'labels' =>  array (
			'name' => __('Accueil news'),
		  'singular-name' => __('Accueil news')
		),
	  'public' => true,
		'has_archive' => false
	));
}

// image
add_theme_support ('post-thumbnails');
add_post_type_support ('accueil-news', 'thumbnail');
add_image_size ('accueil-size', 500, 310, true);

// Position pour widget.
add_action ('widgets_init', 'cmp_widgets_init');
function cmp_widgets_init ()
{
	register_sidebar (array (
		'name' 					=> 'Pied de Page 1',
		'id'						=> 'cmp-footer-1',
		'description'		=> 'Widget pour le placement de la gogole map',
		'before_widget'	=> '<div id="%1$s" class="gmap %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h3>',
		'after_title'		=> '</h3>'
	));

	register_sidebar (array (
		'name' 					=> 'Pied de Page 2',
		'id'						=> 'cmp-footer-2',
		'description'		=> 'Widget pour le placement de la newsletter',
		'before_widget'	=> '<div id="%1$s" class="newsletter %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h3>',
		'after_title'		=> '</h3>'
	));

	register_sidebar (array (
		'name' 					=> 'Pied de Page 3',
		'id'						=> 'cmp-footer-3',
		'description'		=> 'Widget pour le placement des coordonnées de contact',
		'before_widget'	=> '<div id="%1$s" class="contact %2$s">',
		'after_widget'	=> '</div>',
		'before_title'	=> '<h3>',
		'after_title'		=> '</h3>'
	));
}



?>
