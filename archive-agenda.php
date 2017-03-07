<?php get_header(); ?>
<?php
ini_set("xdebug.var_display_max_children", -1);
ini_set("xdebug.var_display_max_data", -1);
ini_set("xdebug.var_display_max_depth", -1);
?>
<div id="content">

    <div id="inner-content" class="row">

        <main id="main" class="large-12 medium-12 columns" role="main">
            <?php
            $args = array(
                'numberposts' => -1,
                'post_type' => 'agenda'
            );
            
            $liste_evenements = array();
            
            $the_query = new WP_Query($args);
            if ($the_query->have_posts()) {
                while ($the_query->have_posts()) {

                    $the_query->the_post();
                    $id_evenement = get_the_id();
                    $nom_evenement = get_the_title();
                   
                    // On 
                    if (have_rows('details_de_levenement')) {
                        // loop through the rows of data
                        while (have_rows('details_de_levenement')) {
                            the_row();

                            $date_debut = get_sub_field('date', false, false);

                            $mois = date_i18n("F", strtotime($date_debut));
                            $lieu = get_sub_field('lieu', false, false);
                            $lieu_address = ($lieu) ? $lieu['address'] : '';
                           
                            $liste_evenements[$mois][$id_evenement][$date_debut] = array(
                                'date_de_debut' => $date_debut,
                                'lieu' => $lieu_address
                            );
                        }
                    }
                }
            }
            wp_reset_query();
        
            include(locate_template('parts/loop-archive-agenda.php'));  
            
            ?>

        </main> <!-- end #main -->

    </div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php   ?> 
<?php get_footer(); ?>