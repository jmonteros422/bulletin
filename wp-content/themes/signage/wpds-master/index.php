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
	            if($the_query->have_posts()) : while ($the_query->have_posts() ) : $the_query->the_post(); ?>
				<?php $videoLink =  get_post_meta($post->ID, 'video-link', true) ?>
				<?php $postType =  get_post_meta($post->ID, 'wpds-video-type', true) ?>
                <li class="post-box large-12 columns">
          		<div class="row">
					<!--Check what kind of slide user wants to post -->
				<?php if ($postType != 'none'): ?>
					<?php if ($postType == 'uploaded'): ?>
						<div class="video">
							<video class="videoContent" data-autoplay="true" controls width="100%">
								<source src="<?php echo $postType ?>" type="video/mp4" />
							</video>
						</div>
					<?php else: ?>
					<!--Check if video is youtube or vimeo as they have different ways to autoplay a video-->
						<?php if (preg_match( '/youtube/', $videoLink)){ ?>
							<div class="videoWrapper">
								<iframe class="videoContent" src="<?php echo $videoLink ?>?autoplay=1" frameborder="0" allowfullscreen data-autoplay="true"></iframe>
							</div>
						<?php }else{ ?>
							<div class="videoWrapper">
								<iframe class="videoContent" src="<?php echo $videoLink ?>?autoplay=1" frameborder="0" allowfullscreen data-autoplay="true"></iframe>
							</div>
						<?php } ?>
					<?php endif; ?>
				<?php else: ?>
					<!--Post text/images to slide-->
          		<?php echo do_shortcode( get_the_content() ) ?>
				<?php endif; ?>
				</div>
				</li>
	            <?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_query();?>
			</ul>
	</div>
</div>

<?php get_footer(); ?>
