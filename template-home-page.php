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
        background-position:center;
    }
</style>
<div style="display:table; width:100%; height:100%; top: 0; position: absolute; z-index: -1;">
    <div style="display:table-cell; vertical-align: middle; text-align: center;">
            <h1 style="color: #ffffff;"><?php echo $images[0]['caption']?></h1> 
    </div> 
</div>
   
<?php get_footer(); ?>
