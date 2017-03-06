<?php
// Adjust the amount of rows in the grid
/*
$date = get_field('date', false, false);
$date = new DateTime($date);
echo $date->format('M'); */

$getPost = new wp_query();
$index= $getPost->current_post - 1;
echo "<font style='color:red'>".$index. "</font>"
?>

<?php //if (0 === ( $wp_query->current_post ) % $grid_columns): ?>

    <div class="row archive-grid" data-equalizer> <!--Begin Row:--> 
    <!--<h1>Nouveau mois</h1>-->
    <?php //endif; ?> 

    
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
    </article> <!-- end article -->

    <?php //if (0 === ( $wp_query->current_post + 1 ) % $grid_columns || ( $wp_query->current_post + 1 ) === $wp_query->post_count): ?>

    </div>  <!--End Row: --> 

<?php //endif; ?>   
