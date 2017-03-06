<?php
// Adjust the amount of rows in the grid

$preview_date = new DateTime(get_field('date', $preview_post_id, false));
$preview_month = $preview_date->format('M');

$current_date = new DateTime(get_field('date', false, false));
$current_month = $current_date->format('M');
?>


<?php if ($preview_month !== $current_month || $preview_post_id == ''): ?>
    </div>
    </div>
    <div class="row">
        <div class="columns large-4">
            <h2><?php echo $current_month ?></h2>
        </div>
        <div class="columns large-8">   
<?php endif; ?>


        <article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">
            <!-------- TITRE -------------->
            <header class="article-header">
                <h3 class="title"><strong><?php the_title(); ?></strong></a></h3>
            </header> <!-- end article header -->	

            <!-------- DATE ----------->
            <?php the_field('date'); ?>

            <!-------- ARTISTES & ENSEMBLE ------>
            <?php $artistes_agenda = get_field('artistes_agenda'); ?>
            <?php if ($artistes_agenda): ?>
                <ul class="inline-list">
                    <?php foreach ($artistes_agenda as $artiste_agenda): ?>
                        <?php setup_postdata($post); ?>
                        <li style="display:inline-block;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                        <?php endforeach; ?>
                        <?php wp_reset_postdata(); ?>
                </ul>
            <?php endif; ?>

            <!-------- LIEU -------------->
            <?php $lieu = get_field('lieu'); ?>
            <?php echo $lieu['address']; ?>
            <hr>
        </article> <!-- end article -->
