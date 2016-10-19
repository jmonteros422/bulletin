<?php
/**
 * Index
 *
 * Standard loop for the front-page
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 1.0
 */

get_header(); ?>
<div class="row">
    <!-- Main Content -->
    <div id='ninja-slider' class="large-12 columns" role="content">
		<div class="slider-inner">
			<ul>
	            <?php
	            $args=array(
	                'post_type' => 'post',
	                'post_status' => 'publish',
	                'orderby' => 'rand'
	            );
	            $the_query = new WP_Query($args);
	            if($the_query->have_posts()) : while ($the_query->have_posts() ) : $the_query->the_post();
//				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large');
//              $background_color = get_post_meta($post->ID, 'background-color', true);
//              $background_image = get_post_meta($post->ID, 'background-image', true);
//              $head_color = get_post_meta($post->ID, 'headline-color', true);
//              $subhead_color = get_post_meta($post->ID, 'subhead-color', true);
//              $copy_color = get_post_meta($post->ID, 'copy-color', true);
//              $link = get_post_meta($post->ID, 'link', true);
//              $videoLink = get_post_meta($post->ID, 'video-link', true);
//				<h2><?php echo get_post_meta($post->ID, 'subtitle', true) ?><!--</h2>-->
<!--				?>-->
                <li class="post-box large-12 columns">
          		<div class="row">
				<?php if (get_post_meta($post->ID, 'wpds-video-type', true) != 'none'): ?>
					<?php if (get_post_meta($post->ID, 'wpds-video-type', true) == 'uploaded'): ?>
						<div class="video">
							<video class="videoContent" data-autoplay="true" controls width="100%">
								<source src="<?php echo get_post_meta($post->ID, 'video-link', true) ?>" type="video/mp4" />
							</video>
						</div>
					<?php else: ?>
						<div class="video">
							<video class="videoContent" data-autoplay="true" controls width="100%">
								<source src="<?php echo get_post_meta($post->ID, 'video-link', true) ?>" type="video/mp4" />
							</video>
						</div>

					<?php endif; ?>

				<?php else: ?>
          		<?php echo do_shortcode( get_the_content() ) ?>
				<?php endif; ?>
				</div>
				</li>

	            <?php endwhile;
	            endif;
				wp_reset_query();
				?>
	            ?>
			</ul>
	</div>
</div>

<?php get_footer(); ?>
