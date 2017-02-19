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
    }
</style>
<div id="content">

    <div id="inner-content" class="row">
        <h1 style="text-align: center; color:#ffffff;"><?php echo $images[0]['caption']?></h1>
    </div> <!-- end #inner-content -->

</div> <!-- end #content -->


<?php get_footer(); ?>
