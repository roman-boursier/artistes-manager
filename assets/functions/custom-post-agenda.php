<?php

/* joints Custom Post Type Example
  This page walks you through creating
  a custom post type and taxonomies. You
  can edit this one or copy the following code
  to create another one.

  I put this in a separate file so as to
  keep it organized. I find it easier to edit
  and change things if they are concentrated
  in their own file.

 */

// let's create the function for the custom type
function custom_post_schedule() {
    // creating (registering) the custom type
    register_post_type('agenda', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
            // let's now add all the options for this post type
            array('labels' => array(
            'name' => __('Schedule', 'jointswp'), /* This is the Title of the Group */
            'singular_name' => __('Date', 'jointswp'), /* This is the individual type */
            'all_items' => __('All dates', 'jointswp'), /* the all items menu item */
            'add_new' => __('Add New', 'jointswp'), /* The add new menu item */
            'add_new_item' => __('Add New date', 'jointswp'), /* Add New Display Title */
            'edit' => __('Edit', 'jointswp'), /* Edit Dialog */
            'edit_item' => __('Edit date', 'jointswp'), /* Edit Display Title */
            'new_item' => __('New date', 'jointswp'), /* New Display Title */
            'view_item' => __('View dates', 'jointswp'), /* View Display Title */
            'search_items' => __('Search Post Type', 'jointswp'), /* Search Custom Type Title */
            'not_found' => __('Nothing found in the Database.', 'jointswp'), /* This displays if there are no entries yet */
            'not_found_in_trash' => __('Nothing found in Trash', 'jointswp'), /* This displays if there is nothing in the trash */
            'parent_item_colon' => ''
        ), /* end of arrays */
        'description' => __('This is the example date', 'jointswp'), /* Custom Type Description */
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'show_ui' => true,
        'query_var' => true,
        'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */
        'menu_icon' => 'dashicons-calendar-alt', /* the icon for the custom post type menu. uses built-in dashicons (CSS class name) */
        'rewrite' => array('slug' => 'agenda', 'with_front' => true), /* you can specify its url slug */
        'has_archive' => 'agenda', /* you can rename the slug here */
        'capability_type' => 'post',
        'hierarchical' => false,
        /* the next one is important, it tells what's enabled in the post editor */
        'supports' => array('title')
            ) /* end of options */
    ); /* end of register post type */

    /* this adds your post categories to your custom post type */
    //register_taxonomy_for_object_type('category', 'artistes');
    /* this adds your post tags to your custom post type */
    //register_taxonomy_for_object_type('post_tag', 'custom_type');
}

// adding the function to the Wordpress init
add_action('init', 'custom_post_schedule');





/*
 * Shortcode permettant d'afficher la liste des événements
 */

add_shortcode('liste_evenements', 'display_liste_evenements');

function display_liste_evenements($atts) {

    /* Argument du shortcode */
    $args = shortcode_atts(array(
        'posts_type' => 'artistes',
        'type' => 'solo',
            ), $atts);

    /* On modifie le comportement de la clause WHERE https://www.advancedcustomfields.com/resources/query-posts-custom-fields/ */

    function my_posts_where($where) {
        $where = str_replace("meta_key = 'details_de_levenement_%", "meta_key LIKE 'details_de_levenement_%", $where);
        return $where;
    }

    add_filter('posts_where', 'my_posts_where');


    /* Récupérer l'année */
    $year = date('Y');
    $first_day_current_year = date('Ymd', mktime(0, 0, 0, 1, 1, $year)); /* Premier jour de l'année courante */
    $first_day_next_year = date('Ymd', mktime(0, 0, 0, 1, 1, $year + 1)); /* Dernier jour de l'année courante */

    /* Utilisé plus tard, lorsque l'on parse le post */
    $today = date('Ymd');

    $query_args = array(
        'numberposts' => -1,
        'post_type' => 'agenda',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => 'details_de_levenement_%_date',
                'compare' => '>=',
                'value' => $first_day_current_year
            ),
            array(
                'key' => 'details_de_levenement_%_date',
                'compare' => '<=',
                'value' => $first_day_next_year
            )
        )
    );


    $string = '';

    /* Tableau contenant la liste des évènement par mois */
    $liste_evenements = array();
    $the_query = new WP_Query($query_args);
    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $id_evenement = get_the_id();

            // On parse toutes les dates pour un même évenement*/
            if (have_rows('details_de_levenement')) {
                while (have_rows('details_de_levenement')) {
                    the_row();
                    /* echo $date_debut . get_the_title(). '<br>'; */
                    $date_debut = get_sub_field('date', false, false);
                    $date_fin = get_sub_field('date_fin', false, false);
                    $mois = date_i18n("F", strtotime($date_debut));
                    $lieu = get_sub_field('lieu', false, false);
                    $lieu_address = ($lieu) ? $lieu['address'] : ''; /* Valeur vide si rien de rentré */
                    if ($date_debut >= $today) {
                        $liste_evenements[$mois][$id_evenement][$date_debut] = array(
                            'date' => $date_debut,
                            'date_fin' => $date_fin,
                            'lieu' => $lieu_address
                        );
                    }
                }
            }
        }
    }
    wp_reset_query();

    /* On trie le tableau par mois de manière décroissante */
    $sort = array('janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'julllet', 'août', 'septembre', 'octobre', 'novembre', 'décembre');
    uksort($liste_evenements, function($value1, $value2) use ($sort) {
        return array_search($value1, $sort) > array_search($value2, $sort);
    }
    );
    ob_start();
    include(locate_template('parts/loop-archive-agenda.php'));
    $string .= ob_get_clean();

    return $string;
}

/* Ajoute la class du custom posttype si affiché via un shortcode */
function my_body_class($c) {
    global $post;
    if (isset($post->post_content) && has_shortcode($post->post_content, 'liste_evenements')) {
        $c[] = 'post-type-archive-agenda';
    }
    return $c;
}

add_filter('body_class', 'my_body_class');

