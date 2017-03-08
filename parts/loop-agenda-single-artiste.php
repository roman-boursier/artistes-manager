<?php
//On récupère les événements liés à cette artiste ou ensemble
$year = date('Y');
$first_day_current_year = date('Ymd', mktime(0, 0, 0, 1, 1, $year)); /* Premier jour de l'année courante */
$first_day_next_year = date('Ymd', mktime(0, 0, 0, 1, 1, $year + 1)); /* Dernier jour de l'année courante */

$args = array(
    'numberposts' => 3,
    'post_type' => 'agenda',
    'meta_query' => array(
        array(
            'key' => 'artiste_ou_ensemble',
            'value' => '"' . get_the_ID() . '"',
            'compare' => 'LIKE'
        )
    )
);
$the_query = new WP_Query($args);
?>
<?php if ($the_query->have_posts()): ?>
    <h2><?php echo __('Float : ', 'jointswp'); ?> </h2>
    <?php while ($the_query->have_posts()): $the_query->the_post() ?>
    <?php the_title(); ?>
        <?php if (have_rows('details_de_levenement')): ?>
            <ul>
                <?php while (have_rows('details_de_levenement')): the_row() ?>
                    <?php
                    $date_debut = get_sub_field('date', false, false);
                    $date_fin =  get_sub_field('date_fin', false, false);
                    $lieu = get_sub_field('lieu', false, false);
                    $lieu_address = ($lieu) ? $lieu['address'] : '';
                    ?>
                    <?php if ($date_debut < $first_day_next_year): //Si la date n'est pas pour l'année prochaine ?> 
                        <li>
                            <!-------- DATE ----------->
                            <?php if ($date_debut < $first_day_next_year): //Si la date n'est pas pour l'année prochaine  ?>
                                <small><?php echo date_i18n("j F", strtotime($date_debut)); ?></small>
                                <small><?php echo ($date_fin) ? ' au ' . date_i18n("j F", strtotime($date_fin)) : ''; ?></small>
                                <small><a href="http://maps.google.com/?q=<?php echo $lieu_address ?>" target="_blank"><?php echo $lieu_address; ?></a></small>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endwhile ?>
            </ul>
        <?php endif ?>
        <hr>
    <?php endwhile; ?>
    <?php wp_reset_query(); ?>
    <a href="<?php echo get_post_type_archive_link('agenda'); ?>" class="button"><?php echo __('View all dates', 'jointswp') ?></a>
<?php endif; ?>
