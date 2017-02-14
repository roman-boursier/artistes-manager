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
        <div class="row clearfix">
            <h2> <?php echo __('Discography :', 'jointswp') ?></h2>
            <?php if (have_rows('discographie')): ?>

                <?php while (have_rows('discographie')): the_row(); ?>
                    <div class="float-left">
                        <div class="row">
                            <div class="columns large-6">
                                <?php $image_disk = wp_get_attachment_image_src(get_sub_field('image'), 'thumbnail'); ?>
                                <img src="<?php echo $image_disk[0]; ?>" alt="<?php echo get_the_title(get_sub_field('image')) ?>" />
                            </div>
                            <div class="columns large-6">
                                <ul>
                                    <li><?php the_sub_field('titre_de_labum'); ?></li>
                                    <li><?php the_sub_field('artistes'); ?></li>
                                    <li><?php the_sub_field('label'); ?></li>
                                    <li><?php the_sub_field('annee_de_parution_'); ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>

        <!-- FINAL SECTION -->
        <div class="row">

            <!-- Agenda -->
            <div class="large-6 colums">

            </div>

            <!-- Liens et ensembles ou artistes -->  
            <div class="large-6 colums"> 
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
                <!-- Téléchargements -->
                <div class="row">
                    <div class="colums">
                        <h2><?php echo __('Groups', 'joins_wp'); ?> </h2>
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