<?php
/*
  Template Name: Home page
 */
?>

<?php get_header(); ?>
<?php $images = get_field('images_de_laccueil'); ?>
<style>
    body{
        background-image:url("<?php echo $images[0]['url'] ?>");
        background-size:cover;
        background-repeat:no-repeat;
        background-position:center left;
    }
</style>
<div class="v-align-container">
    <div>
        <h1><?php the_field('texte_introduction'); ?></h1> 
    </div> 
</div>

<?php get_footer(); ?>
