<?php
//Permet de savoir si c'est une page Artist solo ou ensemble
$solo_artist = has_term('solo', 'artists-type') ? true : false;

//On ecrit le titre correspondant au type (groupe ou solo)
echo '<h2>' . __($solo_artist ? 'Groups' : 'Artists', 'joins_wp') . '</h2>';

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

//On filtre sur les ensembles qui contiennent notre artiste
if ($solo_artist) {
    $args[] = array('meta_query' => array(
            array(
                'key' => 'ensembles',
                'value' => '"' . get_the_ID() . '"',
                'compare' => 'LIKE'
            )
        )
    );
} 
//Sinon on récupère seulement l'ensemble correpondant à la page
else {
    $args['p'] = get_the_ID();
}
$the_query = new WP_Query($args);
?>

<?php if ($the_query->have_posts()): ?>
    <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
        <?php $ensembles = get_field('ensembles'); ?> 
        <?php foreach ($ensembles as $artiste): 
            $type_id = $solo_artist ? $ensembles->ID : $artiste->ID;
            ?>
            <li>
                <?php echo get_the_post_thumbnail($type_id, array(50, 50)); ?>
                <a href="<?php echo get_the_permalink($type_id); ?>"><?php echo get_the_title($type_id); ?></a>
            </li>
            <?php
            // Si solo , pas besoin de continuer le foreach
            if ($solo_artist) { break; }
            ?>
        <?php endforeach; ?>      
    <?php endwhile; ?>
<?php endif; ?>
<?php wp_reset_query(); ?>