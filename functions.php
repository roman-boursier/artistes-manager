<?php

// Theme support options
require_once(get_template_directory() . '/assets/functions/theme-support.php');

// WP Head and other cleanup functions
require_once(get_template_directory() . '/assets/functions/cleanup.php');

// Register scripts and stylesheets
require_once(get_template_directory() . '/assets/functions/enqueue-scripts.php');

// Register custom menus and menu walkers
require_once(get_template_directory() . '/assets/functions/menu.php');

// Register sidebars/widget areas
require_once(get_template_directory() . '/assets/functions/sidebar.php');

// Makes WordPress comments suck less
require_once(get_template_directory() . '/assets/functions/comments.php');

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory() . '/assets/functions/page-navi.php');

// Adds support for multiple languages
require_once(get_template_directory() . '/assets/translation/translation.php');


// Remove 4.2 Emoji Support
// require_once(get_template_directory().'/assets/functions/disable-emoji.php'); 
// Adds site styles to the WordPress editor
//require_once(get_template_directory().'/assets/functions/editor-styles.php'); 
// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/assets/functions/related-posts.php'); 
// Use this as a template for custom post types
require_once(get_template_directory() . '/assets/functions/custom-post-artistes.php');
require_once(get_template_directory() . '/assets/functions/custom-post-agenda.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/assets/functions/login.php'); 
// Customize the WordPress admin
// require_once(get_template_directory().'/assets/functions/admin.php'); 

//Google tools
require_once(get_template_directory() . '/assets/functions/google-tools.php'); 

// ACF Intégration
require_once(get_template_directory() . '/assets/functions/acf-plugin-integration.php'); //Plugin
//require_once(get_template_directory().'/assets/functions/acf-fields-integration.php'); //Plugin

if( function_exists('acf_add_options_page') ) {	
	acf_add_options_page();
}


/*A déplacer ailleurs*/
function home_height() {
    if (is_front_page()) {
        ob_start();
        ?>
        <script>
           var htmlElement = document.getElementsByTagName('html')[0];
               htmlElement.className += ' fullscreen overlay';
        </script>
        <?php
        echo ob_get_clean();
    }
}
add_action('wp_footer', 'home_height');

/* Permet de savoir si il s'agit d'un artiste seul ou d'un ensemble*/
function is_ensemble() {
    if (is_singular('artistes')) {
       return has_term('solo', 'artists-type') ? true : false;
    }
}
add_action('init', 'is_ensemble');







