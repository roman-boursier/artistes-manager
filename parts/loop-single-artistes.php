<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

    <header class="article-header">	
        <h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
        <?php //get_template_part('parts/content', 'byline'); ?>
    </header> <!-- end article header -->

    <section class="entry-content" itemprop="articleBody">


        <?php if (get_field('biographie')): ?>
            <!-- BIOGRAPHY -->
            <div class="row " style="margin-bottom:30px">
                <div class="columns large-12">
                    <h2> <?php echo is_ensemble() ? __('Biography :', 'jointswp') : __('Présentation :', 'jointswp'); ?> </h2>
                    <?php $biographie = get_field('biographie'); ?>
                    <?php if (strlen($biographie) > 600): ?>
                        <?php
                        $part_1 = substr($biographie, 0, strpos($biographie, ' ', 600)) . " ...";
                        $part_2 = substr($biographie, strpos($biographie, ' ', 600));
                        ?>
                        <div class="show">
                            <?php echo $part_1; ?>
                        </div>
                        <div class="hide">
                            <?php echo $part_2; ?>
                        </div>
                        <a class="button more">
                            <span><?php echo __('Read more', 'jointswp'); ?></span>
                            <span><?php //echo __('Close', 'jointswp');     ?></span>
                        </a>
                    <?php else: ?>
                        <?php echo $biographie ?>
                    <?php endif; ?>  
                </div>
            </div>
        <?php endif; ?>


        <!-- GALLERY MEDIA -->
        <?php if (have_rows('galerie_media')): ?>
            <div class="row extendfull" style="background-color:#f3f3f3; margin-bottom:30px!important;">
                <h2> <?php echo __('Média gallery :', 'jointswp') ?></h2>
                <div class="columns">
                    <div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit data-auto-play="false" data-options="animInFromLeft:fade-in; animInFromRight:fade-in; animOutToLeft:fade-out; animOutToRight:fade-out;">
                        <ul id="artists-media-galery" class="orbit-container">
                            <button class="orbit-previous"><span class="show-for-sr">Previous Slide</span> &#9664;&#xFE0E;</button>
                            <button class="orbit-next"><span class="show-for-sr">Next Slide</span> &#9654;&#xFE0E;</button>
                            <?php while (have_rows('galerie_media')): the_row(); ?>
                                <li class="orbit-slide">
                                    <?php if (get_sub_field('image_ou_video') == 'image'): ?>
                                        <div>
                                            <?php $image = get_sub_field('image_galerie'); ?>
                                            <img class="centered-image" src="<?php echo $image['sizes']['large']; ?>" alt="" />
                                        </div> 
                                    <?php else: ?>
                                        <div class="flex-video">
                                            <?php
                                            preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', get_sub_field('lien_youtube'), $match);
                                            $youtube_id = $match[1];
                                            ?>
                                            <iframe width="560" height="315" src="http://www.youtube.com/embed/<?php echo $youtube_id; ?>?enablejsapi=1"   frameborder="0" allowfullscreen></iframe>
                                        </div>
                                    <?php endif; ?>

                                </li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- DISCOGRAPHY -->
        <?php if (have_rows('discographie')): ?>
            <div class="row">
                <div class="columns large-12"><h2> <?php echo __('Discography :', 'jointswp') ?></h2></div>
            </div>
            <div class="row small-up-1 medium-up-2 large-up-3" >
                <?php while (have_rows('discographie')): the_row(); ?>
                    <div class="column column-block">
                        <?php $image_disk = wp_get_attachment_image_src(get_sub_field('image_album'), array(150, 150)); ?>
                        <img class="float-left" style="margin-right:10px" src="<?php echo $image_disk[0]; ?>" alt="<?php echo get_the_title(get_sub_field('image_album')) ?>" width="150"/>
                        <ul style="line-height:1.15em;">
                            <li><small><strong><?php the_sub_field('titre_de_labum'); ?></strong></small></li>
                            <li><small><?php the_sub_field('artistes'); ?></small></li>
                            <li><small><span style="text-decoration: underline"><?php echo __('Label', 'jointswp') ?></span> : <?php the_sub_field('label'); ?></small></li>
                            <li><small><span style="text-decoration: underline"><?php echo __('Year', 'jointswp') ?></span> : <?php the_sub_field('annee_de_parution_'); ?></small></li>
                        </ul>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>


        <!-- FINAL SECTION -->
        <div class="row">

            <!-- Agenda -->
            <div class="columns large-6">
                <?php include(locate_template('parts/loop-agenda-single-artiste.php')); ?> 
            </div>

            <!-- Liens et ensembles ou artistes -->  
            <div class="large-6 columns">

                <!-- Groups -->
                
                <?php include('loop-ensembles.php'); ?>

                <!-- Liens -->         
                <div class="row">
                    <div class="columns">
                        <?php if (have_rows('liens_et_telechargements')): ?>
                            <h2><?php echo __('Links and downloads : ', 'jointswp'); ?></h2> 
                            <ul class="no-bullet">
                                <?php while (have_rows('liens_et_telechargements')): the_row(); ?>
                                    <li><a href="<?php the_sub_field('liens') ?>" target="_blank"><?php the_sub_field('nom_du_lien') ?></a></li>
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

    <?php // comments_template();     ?>	

</article> <!-- end article -->
