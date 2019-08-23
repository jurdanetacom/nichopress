<?php get_header();
$mostrar_sidebar = get_option('facilius_mostrar_sidebar'); 
global $post;?>
<div class="row">
	
	<section <?php if($mostrar_sidebar){echo 'class=" medium-4 columns"';} ?> >
		<?php  if (have_posts()) : while (have_posts()) : the_post();?>
		<article id="post-<?php the_ID();?>" <?php post_class('content columns'); ?>>
            <header><?php
				if(get_option('facilius_breadcrumbsingle')){ breadcrumb_links();};
				facilius_post_title(get_queried_object_id());	
				facilius_metadata_post();
				if(get_option('facilius_start_sharebar')){ facilius_compartir_post();  };		
				facilius_ad_over_content();
			 	if ( ! empty( $post->post_parent ) ) : ?>
					<p class="page-title"><a href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'Return to %s', 'facilius' ), strip_tags( get_the_title( $post->post_parent ) ) ) ); ?>" rel="gallery">
						<?php
				    		/* translators: %s - title of parent post */
							printf( __( '<span class="meta-nav">&larr;</span> %s', 'nichopress' ), get_the_title( $post->post_parent ) );
						?>
					</a></p>
				<?php endif; ?>
			</header>
			<section>
                <?php 
                if ( wp_attachment_is_image() ) :
                    $attachments = array_values(
                        get_children(
                            array(
                                'post_parent'    => $post->post_parent,
                                'post_status'    => 'inherit',
                                'post_type'      => 'attachment',
                                'post_mime_type' => 'image',
                                'order'          => 'ASC',
                                'orderby'        => 'menu_order ID',
                            )
                        )
                    );
                    foreach ( $attachments as $k => $attachment ) {
                        if ( $attachment->ID == $post->ID ) {
                            break;
                        }
                    }
        
                    // If there is more than 1 image attachment in a gallery
                    if ( count( $attachments ) > 1 ) {
                        $k++;
                        if ( isset( $attachments[ $k ] ) ) {
                            // get the URL of the next image attachment
                            $next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
                        } else {          // or get the URL of the first image attachment
                            $next_attachment_url = get_attachment_link( $attachments[0]->ID );
                        }
                    } else {
                        // or, if there's only 1 image attachment, get the URL of the image
                        $next_attachment_url = wp_get_attachment_url();
                    }
                    ?>
                                <p class="attachment"><a href="<?php echo esc_url( $next_attachment_url ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment">
                                        <?php  echo wp_get_attachment_image( $post->ID, 'large' ); // filterable image width with, essentially, no limit for image height.
                                                                            ?>
                                    </a></p>
                                    <div class="entry-caption">
						<?php
						if ( ! empty( $post->post_excerpt ) ) {
							the_excerpt();}
						?>
                    </div>
                                    <div id="nav-below" class="navigation">
                                        <div class="nav-previous"><?php previous_image_link( false ); ?></div>
                                        <div class="nav-next"><?php next_image_link( false ); ?></div>
                                    </div><!-- #nav-below -->
                <?php else : ?>
                                <a href="<?php echo esc_url( wp_get_attachment_url() ); ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><?php echo esc_html( basename( get_permalink() ) ); ?></a>
            <?php endif; ?>


                <?php  
                facilius_next_page(); ?>
			</section>
			<footer><?php
				
				facilius_ad_under_content();
				facilius_compartir_post(); ?>
				<div id="related-posts">
					<?php facilius_related_posts($post->ID); ?>	
				</div>	
			</footer>
		</article>
		<?php endwhile; endif; ?>	 
		<?php facilius_show_comments(); ?>
	</section>
	<?php if($mostrar_sidebar){ get_sidebar('nichopress');  } ?>	
</div>




<?php

get_footer(); ?>