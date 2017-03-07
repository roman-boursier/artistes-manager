<?php
//On récupère les événements liés à cette artiste ou ensemble
$args = array(
    'numberposts' => 8,
    'post_type' => 'agenda',
    'meta_query' => array(
        array(
            'key' => 'artistes_agenda',
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
        <?php the_title() ?>
        <?php the_field('date') ?>
        <hr>
    <?php endwhile; ?>
    <?php wp_reset_query(); ?>
        <a href="<?php echo get_post_type_archive_link('agenda'); ?>" class="button"><?php echo __('View all dates', 'jointswp')?></a>
<?php endif; ?>
