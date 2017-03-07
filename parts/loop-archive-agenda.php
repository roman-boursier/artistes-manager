<?php
$preview_month = date_i18n("F", strtotime(get_field('date', $preview_post_id, false)));
$current_month = date_i18n("F", strtotime(get_field('date', false, false)));
?>


<?php if ($preview_month !== $current_month || $preview_post_id == ''): ?>
    </div>
    </div>
    <div class="row">
        <div class="columns large-2">
            <h2><?php echo $current_month ?></h2>
        </div>
        <div class="columns large-10">   
        <?php endif; ?>


        <article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">
            <!-------- TITRE -------------->
            <header class="article-header">
                <h3 class="title"><strong><?php the_title(); ?></strong></h3>
            </header> <!-- end article header -->	

            <!-------- ARTISTES & ENSEMBLE ------>
            <?php $artistes_agenda = get_field('artistes_agenda'); ?>
            <?php if ($artistes_agenda): ?>
                <ul class="menu simple">
                    <?php foreach ($artistes_agenda as $artiste_agenda): ?>
                        <?php $artiste_id = $artiste_agenda->ID; ?>
                        <li><a href="<?php echo get_the_permalink($artiste_id); ?>"><small><?php echo get_the_title($artiste_id); ?></small></a></li>
                        <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <!-------- DATE ----------->
            <small><?php the_field('date'); ?></small>

            <!-------- LIEU -------------->
            <?php $lieu = get_field('lieu'); ?>
             <small><?php echo $lieu['address']; ?></small>
            <hr>
        </article> <!-- end article -->
