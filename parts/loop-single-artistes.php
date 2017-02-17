<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

    <header class="article-header">	
        <h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
        <?php //get_template_part('parts/content', 'byline'); ?>
    </header> <!-- end article header -->

    <section class="entry-content" itemprop="articleBody">

        <!-- BIOGRAPHY -->
        <div class="row">
            <div class="colums">
                <h2> <?php echo __('Biography :', 'jointswp') ?></h2>
                <?php if (get_field('biographie')): ?>
                    <p><?php the_field('biographie') ?>;</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- GALLERY MEDIA -->
        <div class="row">
            <div class="colums">
                <h2> <?php echo __('Média gallery :', 'jointswp') ?></h2>
                <?php if (get_field('galerie_media')): ?>
                    <?php $images = get_field('galerie_media'); ?>
                    <?php if ($images): ?>
                        <div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit>
                            <ul class="orbit-container">
                                <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span> &#9664;&#xFE0E;</button>
                                <button class="orbit-next"><span class="show-for-sr">Next Slide</span> &#9654;&#xFE0E;</button>
                                <?php foreach ($images as $image): ?>
                                    <li class="orbit-slide">
                                        <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" />
                                        <p><?php echo $image['caption']; ?></p>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>

        <!-- DISCOGRAPHY -->
        <div class="row small-up-1 medium-up-2 large-up-3">
            <h2> <?php echo __('Discography :', 'jointswp') ?></h2>
            <?php if (have_rows('discographie')): ?>
                <?php while (have_rows('discographie')): the_row(); ?>
                    <div class="column column-block">
                        <?php $image_disk = wp_get_attachment_image_src(get_sub_field('image'), 'thumbnail'); ?>
                        <img class="float-left" style="margin-right:10px" src="<?php echo $image_disk[0]; ?>" alt="<?php echo get_the_title(get_sub_field('image')) ?>" />
                        <ul>
                            <li><strong><?php the_sub_field('titre_de_labum'); ?></strong></li>
                            <li><?php the_sub_field('artistes'); ?></li>
                            <li><?php the_sub_field('label'); ?></li>
                            <li><?php the_sub_field('annee_de_parution_'); ?></li>
                        </ul>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>

        <!-- FINAL SECTION -->
        <div class="row">

            <!-- Agenda -->
            <div class="large-6 columns">
                <h2><?php echo __('Float', 'joins_wp'); ?> </h2>
            </div>

            <!-- Liens et ensembles ou artistes -->  
            <div class="large-6 columns">

                <!-- Groups -->
                <div class="row">
                    <div class="colums">
                        <?php
                        
                        $posts = get_field('ensembles');
                        if ($posts):
                            ?>
                            <h2><?php echo __('Groups', 'joins_wp'); ?> </h2>
                            <ul>
                                <?php
                                foreach ($posts as $post):
                                    setup_postdata($post);
                                    ?>
                                    <li>
                                        <?php the_post_thumbnail(array(50, 50)); ?>
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>

                            <?php
                            wp_reset_postdata(); 
                        endif;
                        ?>
                        <?php
                        
                        ?>    
                            
                    </div>
                </div>    

                <!-- Liens -->         
                <div class="row">
                    <div class="colums">
                        <h2><?php echo __('Links and downloads', 'joins_wp'); ?></h2>    
                        <?php if (have_rows('liens_et_telechargements')): ?>
                            <ul>
                                <?php while (have_rows('liens_et_telechargements')): the_row(); ?>
                                    <li><?php the_sub_field('liens') ?></li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>  
            </div>
        </div>

    </section> <!-- end article section -->

    <footer class="article-footer">
        <?php wp_link_pages(array('before' => '<div class="page-links">' . esc_html__('Pages:', 'jointswp'), 'after' => '</div>')); ?>
        <p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'jointswp') . '</span> ', ', ', ''); ?></p>	
    </footer> <!-- end article footer -->

    <?php // comments_template();  ?>	

</article> <!-- end article -->