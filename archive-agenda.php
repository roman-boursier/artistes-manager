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
            /* Récupérer l'année */
            $year = date('Y');
            $first_day_current_year = date('Ymd', mktime(0, 0, 0, 1, 1, $year)); /* Premier jour de l'année courante */
            $first_day_next_year = date('Ymd', mktime(0, 0, 0, 1, 1, $year + 1)); /* Dernier jour de l'année courante */
            
            /*Utilisé plus tard, lorsque l'on parse le post*/
            $today = date('Ymd');
            
            //echo $first_day_current_year . '<br>'.  $first_day_next_year .'<br><br>'; 

            /*  Requête sur les posts de l'agenda - On récupère tous les évenements  : 
              - Si le post contient l'année en cours
              - Si le post ne contient pas l'année en cours il ne sera pas récupéré
              - Si le post contient l'année en cours et une autre année, on le récupère quand même. Il sera filtré dans une condition par la suite
              - On se préoccupe pas de la date de fin
             * */

            /* On modifie le comportement de la clause WHERE https://www.advancedcustomfields.com/resources/query-posts-custom-fields/ */
            function my_posts_where($where) {
                $where = str_replace("meta_key = 'details_de_levenement_%", "meta_key LIKE 'details_de_levenement_%", $where);
                return $where;
            }

            add_filter('posts_where', 'my_posts_where');

            $args = array(
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

            /* Tableau contenant la liste des évènement par mois */
            $liste_evenements = array();

            $the_query = new WP_Query($args);
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
                            if($date_debut >= $today) {
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
                return array_search($value1, $sort) < array_search($value2, $sort);
            }
            );

            /* Le template ci dessous va parser ce nouveau tableau */
            include(locate_template('parts/loop-archive-agenda.php'));
            ?>

        </main> <!-- end #main -->

    </div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php ?> 
<?php get_footer(); ?>