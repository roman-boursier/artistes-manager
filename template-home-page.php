<?php
/*
  Template Name: Home page
 */
?>

<?php get_header(); ?>
<style>
    body{
        background-image:url("<?php echo get_the_post_thumbnail_url($post->ID, 'big'); ?>");
        background-size:cover;
        background-repeat:no-repeat;
        background-position:center center;
    }
</style>
<div class="v-align-container">
    <div>
        <h1><?php the_field('texte_dintroduction'); ?></h1> 
    </div> 
</div>

<?php get_footer(); ?>
