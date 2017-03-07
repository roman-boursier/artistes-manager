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
            $today = date('Ymd');

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

                          
                                $liste_evenements[$mois]=array();
                         
                                   array(
                                    $id_evenement => array(
                                        'titre' => $nom_evenement,
                                        'dates'.rand()  => array(
                                            'date_debut' => $date_debut,
                                            'lieu' => $lieu
                                        )
                                    )
                                );
                            
                        }
                    }
                }
            }
            wp_reset_query();

            var_dump($liste_evenements);


            /*
              $liste_evenements = array(
              'mois1' => array (
              'id_evenement' => array(
              'titre' => 'titre',
              'artistes' => 'artiste 1',
              'dates'=> array(
              'date' => array(
              'date_debut' => '00/00/00',
              'date_fin' => '00/00/00',
              'lieu' => 'lieu'
              )
              )
              )
              )

              ); */
            ?>

        </main> <!-- end #main -->

    </div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php //include(locate_template('parts/loop-archive-agenda.php'));   ?> 
<?php get_footer(); ?>