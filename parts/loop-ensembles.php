<?php
//Permet de savoir si c'est une page Artist solo ou ensemble
$solo_artist = has_term('solo', 'artists-type') ? true : false;

//On récupère tous les ensemble du site
$args = array(
    'numberposts' => -1,
    'post_type' => 'artistes',
    'tax_query' => array(
        array(
            'taxonomy' => 'artists-type',
            'field' => 'name',
            'terms' => 'ensemble',
        ),
    ),
);

//Si ensemble, on filtre sur les ensembles qui contiennent notre artiste
if ($solo_artist) {
    $args['meta_query'] = array(
        array(
            'key' => 'ensembles',
            'value' => '"' . get_the_ID() . '"',
            'compare' => 'LIKE'
        )
    );
}
//Si artiste seul on récupère seulement l'ensemble correpondant à la page
else {
    $args['p'] = get_the_ID();
}
$the_query = new WP_Query($args);
?>

<?php if ($the_query->have_posts()): ?>
    <div class="row">
        <div class="columns">
            <?php echo '<h2>' . __($solo_artist ? 'Groups : ' : 'Artists : ', 'jointswp') . '</h2>'; ?>
            <ul class="no-bullet ensembles">
                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <?php $ensembles = get_field('ensembles'); ?>
                    <?php
                    foreach ($ensembles as $artiste):
                        $type_id = $solo_artist ? $ensembles->ID : $artiste->ID;
                        ?>
                        <li>
                            <?php echo get_the_post_thumbnail($type_id, array(50, 50)); ?>
                            <a href="<?php echo get_the_permalink($type_id); ?>"><strong> <?php echo get_the_title($type_id); ?></strong></a>
                        </li>
                        <?php
                        if ($solo_artist) {// Si solo , pas besoin de continuer le foreach
                            break;
                        }
                        ?>
                    <?php endforeach; ?>      
                <?php endwhile; ?>
            </ul>
        </div>
    </div>    
<?php endif; ?>
<?php wp_reset_query(); ?>