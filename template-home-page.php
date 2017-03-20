<?php
/*
  Template Name: Home page
 */
?>

<?php get_header(); ?>
<?php $images = get_field('images_de_laccueil');
$logo = get_field('logo_du_site', 'option');

?>
<style>
    body{
        background-image:url("<?php echo $images[0]['url'] ?>");
        background-size:cover;
        background-repeat:no-repeat;
        background-position:center center;
    }
</style>
<div class="v-align-container">
    <div>
        <?php $images = get_field('images_de_laccueil'); ?>
        <img class="logo" src="<?php echo $logo['url']; ?>" alt="<?php bloginfo('name'); ?>"/><br>
        <h1><?php the_field('texte_introduction'); ?></h1> 
    </div> 
</div>

<?php get_footer(); ?>
