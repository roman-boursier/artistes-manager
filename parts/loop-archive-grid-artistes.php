	<div class="column column-block" >
		
			<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">
                                
				<section class="featured-image" itemprop="articleBody">
					<?php the_post_thumbnail('full'); ?>
				</section> <!-- end article section -->
			
				<section class="entry-content" itemprop="articleBody">
					<?php the_content('<button class="tiny">' . __( 'Read more...', 'jointswp' ) . '</button>'); ?> 
				</section> <!-- end article section -->
                                
                                <header class="article-header">
                                    <h3 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><strong><?php the_title(); ?></strong></a></h3>
                                     <?php echo get_the_term_list( $post->ID, 'instruments', '<span>', ' , ', '</span>' ) ?> 
				</header> <!-- end article header -->	
                               
								    							
			</article> <!-- end article -->
			
		</div>

   

