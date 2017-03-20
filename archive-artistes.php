<?php get_header(); ?>

<div id="content">

    <div id="inner-content" class="row">

        <main id="main" class="large-12 medium-12 columns" role="main">

            <?php if (have_posts()) : ?>

                <!-- Section des artistes -->
                <?php echo do_shortcode('[liste_artistes type="solo"]');?>
                
                <!-- Section des emsembles --> 
                <?php echo do_shortcode('[liste_artistes type="ensemble"]');?>
                
                <?php //joints_page_navi(); ?>

            <?php else : ?>

                <?php get_template_part('parts/content', 'missing'); ?>

            <?php endif; ?>

        </main> <!-- end #main -->

    </div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>