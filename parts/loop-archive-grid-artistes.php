	<div class="column column-block" >
		
			<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">
                                
				<section class="featured-image" itemprop="articleBody">
                                    <a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
				</section> <!-- end article section -->
			
				<section class="entry-content" itemprop="articleBody">
					<?php the_content('<button class="tiny">' . __( 'Read more...', 'jointswp' ) . '</button>'); ?> 
				</section> <!-- end article section -->
                                
                                <header class="article-header">
                                    <h3 class="title"><strong><?php the_title(); ?></strong></a></h3>
                                    <?php echo get_the_term_list( $post->ID, 'instruments', '<small>', ' , ', '</small>' ) ?> 
				</header> <!-- end article header -->	
                               
								    							
			</article> <!-- end article -->
			
		</div>

   

