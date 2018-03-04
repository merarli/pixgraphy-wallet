<?php
/**
 * The template for displaying content.
 *
 * @package Theme Freesia
 * @subpackage Pixgraphy
 * @since Pixgraphy 1.0
 */
$pixgraphy_settings = pixgraphy_get_theme_options();
if($pixgraphy_settings['pixgraphy_photography_layout'] != 'photography_layout'){ ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class();?>>
			<header class="entry-header">
				<h2 class="entry-title"> <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"> <?php the_title();?> </a> </h2> <!-- end.entry-title -->
				<?php  $entry_format_meta_blog = $pixgraphy_settings['pixgraphy_entry_meta_blog'];
				if($entry_format_meta_blog == 'show-meta' ){?>
				<div class="entry-meta">
					<?php $format = get_post_format();
					if ( current_theme_supports( 'post-formats', $format ) ) {
						printf( '<span class="entry-format">%1$s<a href="%2$s">%3$s</a></span>',
							sprintf( ''),
							esc_url( get_post_format_link( $format ) ),
							get_post_format_string( $format )
						);
					} ?>
					<span class="author vcard"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author(); ?>"><i class="fa fa-user"></i>
					<?php the_author(); ?> </a></span> <span class="posted-on"><a title="<?php echo esc_attr( get_the_time() ); ?>" href="<?php the_permalink(); ?>"><i class="fa fa-calendar"></i>
					<?php the_time( get_option( 'date_format' ) ); ?> </a></span>
					<?php if ( comments_open() ) { ?>
					<span class="comments"><i class="fa fa-comment"></i>
					<?php comments_popup_link( __( 'No Comments', 'pixgraphy' ), __( '1 Comment', 'pixgraphy' ), __( '% Comments', 'pixgraphy' ), '', __( 'Comments Off', 'pixgraphy' ) ); ?> </span>
					<?php } ?>
				</div> <!-- end .entry-meta -->
				<?php } ?>
			</header> <!-- end .entry-header -->
		<?php
			$pixgraphy_blog_post_image = $pixgraphy_settings['pixgraphy_blog_post_image'];
					if( has_post_thumbnail() && $pixgraphy_blog_post_image == 'on') { ?>
						<div class="post-image-content">
							<figure class="post-featured-image">
								<a href="<?php the_permalink();?>" title="<?php echo the_title_attribute('echo=0'); ?>">
								<?php the_post_thumbnail('thumbnail'); ?>
								</a>
							</figure><!-- end.post-featured-image  -->
						</div> <!-- end.post-image-content -->
					<?php } ?>

			<div class="entry-content">
				<?php $content_display = $pixgraphy_settings['pixgraphy_blog_content_layout'];
					if($content_display == 'fullcontent_display'):
						the_content();
					else:
						the_excerpt();
					endif; ?>
			</div> <!-- end .entry-content -->
			<?php
				$excerpt = get_the_excerpt();
				$content = get_the_content();
				$disable_entry_format = $pixgraphy_settings['pixgraphy_entry_format_blog'];
				if($disable_entry_format =='show' || $disable_entry_format =='show-button' || $disable_entry_format =='hide-button'){ ?>
					<footer class="entry-footer">
						<?php if($disable_entry_format !='show-button'){ ?>
						<span class="cat-links">
						<?php esc_html_e('Category : ','pixgraphy');  the_category(', '); ?>
						</span> <!-- end .cat-links -->
						<?php $tag_list = get_the_tag_list( '', __( ', ', 'pixgraphy' ) );
							if(!empty($tag_list)){ ?>
							<span class="tag-links">
							<?php   echo $tag_list; ?>
							</span> <!-- end .tag-links -->
							<?php }
						}
						$pixgraphy_tag_text = $pixgraphy_settings['pixgraphy_tag_text'];
						if(strlen($excerpt) < strlen($content) && $disable_entry_format !='hide-button'){ ?>
						<a class="more-link" title="<?php the_title_attribute('echo=0');?>" href="<?php the_permalink();?>">
						<?php
							if($pixgraphy_tag_text == 'Read More' || $pixgraphy_tag_text == ''):
								esc_html_e('Read More', 'pixgraphy');
							else:
								echo esc_attr($pixgraphy_tag_text);
							endif;?>
						<span></span> </a>
						<?php } ?>
					</footer> <!-- .entry-meta -->
				<?php
				} ?>
			</article>
<?php } else {  ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('post-container pixgraphy-animation fadeInUp');?>>
		<div class="post-column">
		<?php
		if( has_post_thumbnail()) {
			$image = '';
			$title_attribute = apply_filters( 'the_title', get_the_title( $post->ID ) );
			$image .= '<figure class="post-featured-image">';
			$image .= '<a href="' . get_permalink() . '" title="'.the_title_attribute('echo=0').'">';
			$image .= get_the_post_thumbnail( $post->ID, 'thumb-square', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ) ) ).'</a>';
			$image .= '</figure><!-- end.post-featured-image  -->';
			echo $image;
		} ?>
			<header class="entry-header">
				<h2 class="entry-title">
					<a title="<?php the_title();?>" href="<?php the_permalink(); ?>"><?php the_title();?></a>
				</h2>
				<!-- end.entry-title -->
				<div class="entry-content">
					<?php the_excerpt();?>
				</div>
				<!-- end .entry-content -->
				<?php
					$entry_format_meta_blog = $pixgraphy_settings['pixgraphy_entry_meta_blog'];
					if($entry_format_meta_blog == 'show-meta' ){?>
					<div class="entry-meta">
						<span class="author vcard"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php the_author(); ?>"><i class="fa fa-user"></i>
						<?php the_author(); ?> </a></span> <span class="posted-on"><a title="<?php echo esc_attr( get_the_time() ); ?>" href="<?php the_permalink(); ?>"><i class="fa fa-calendar"></i>
						<?php the_time( get_option( 'date_format' ) ); ?> </a></span>
						<?php if ( comments_open() ) { ?>
						<span class="comments">
						<?php comments_popup_link( __( '<i class="fa fa-comment"></i>', 'pixgraphy' ), __( '<i class="fa fa-comment"></i>', 'pixgraphy' ), __( '% <i class="fa fa-comment"></i>', 'pixgraphy' ), '', __( 'Comments Off', 'pixgraphy' ) ); ?> </span>
						<?php } ?>
					</div> <!-- end .entry-meta -->
				<?php } ?>

			</header>
			<!-- end .entry-header -->
		</div>
		<!-- end .post-column -->
	</article>
	<!-- end .post-container -->
<?php	}
