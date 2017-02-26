<?php get_header(); ?>

<div id="content">

    <div id="inner-content" class="row">

        <main id="main" class="large-12 medium-12 columns" role="main">

            <?php if (have_posts()) : ?>

               
            
                <div class="row small-up-2 medium-up-4 large-up-5">
                     <!-- Section des artistes -->
                <h2 style="text-transform:uppercase;"> <?php echo __('Artists : ', 'jointswp') ?></h2><hr>
                    <?php while (have_posts()) : the_post(); ?> 
                        <?php if (has_term('solo','artists-type')) : ?>
                            <?php get_template_part('parts/loop', 'archive-grid-artistes'); ?> 
                        <?php endif ?>
                <?php endwhile; ?>
                </div>

                <!-- Section des emsembles --> 
                <h2 style="text-transform:uppercase;"><?php echo __('Groups : ', 'jointswp') ?></h2><hr>               
                <div class="row small-up-2 medium-up-4 large-up-6">
                <?php while (have_posts()) : the_post(); ?>
                        <?php if (has_term('ensemble','artists-type')) : ?>
                            <?php get_template_part('parts/loop', 'archive-grid-artistes'); ?>
                        <?php endif ?>
                    <?php endwhile; ?>
                </div>
                
                <?php //joints_page_navi(); ?>

            <?php else : ?>

                <?php get_template_part('parts/content', 'missing'); ?>

            <?php endif; ?>

        </main> <!-- end #main -->

    </div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>