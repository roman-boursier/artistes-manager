<?php get_header(); ?>

<div id="content">

    <div id="inner-content" class="row">

        <main id="main" class="large-12 medium-12 columns" role="main">

            <?php if (have_posts()) : ?>

                <!-- Section des artistes -->
                <?php while (have_posts()) : the_post(); ?>
                    <hr>
                    <?php get_template_part('parts/loop', 'archive-agenda'); ?> 
                    <hr>
                <?php endwhile; ?>

                <?php //joints_page_navi(); ?>

            <?php else : ?>
                
                <?php get_template_part('parts/content', 'missing'); ?>

            <?php endif; ?>

        </main> <!-- end #main -->

    </div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>