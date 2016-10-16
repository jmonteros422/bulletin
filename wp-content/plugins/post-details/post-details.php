<?php

/*
Plugin Name: WPDS Post Details
Plugin URI: http://pixelydo.com/work/wordpress-digital-signage/
Description: WPDS post details
Author: Nate Jones
Version: 1.0
Author URI: http://pixelydo.com/
*/


/**
 * Adds a meta box to the post editing screen
 */
function wpds_custom_meta() {
	add_meta_box( 'wpds', __( 'Video Url (Content will be ignored if this is not empty!)', 'wpds-textdomain' ), 'wpds_meta_callback', 'post' );
}
add_action( 'add_meta_boxes', 'wpds_custom_meta' );

/**
 * Outputs the content of the meta box
 */
function wpds_meta_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'wpds_nonce' );
	$wpds_stored_meta = get_post_meta( $post->ID );
	?>
<p>
	<label for="link" class="wpds-row-title"><?php _e( 'Video Link', 'wpds-textdomain' )?></label>
	<input type="text" name="video-link" id="video-link" value="<?php if ( isset ( $wpds_stored_meta['video-link'] ) ) echo $wpds_stored_meta['video-link'][0]; ?>" />
</p>



	<?php
}



/**
 * Saves the custom meta input
 */
function wpds_meta_save( $post_id ) {

	// Checks save status
	$is_autosave = wp_is_post_autosave( $post_id );
	$is_revision = wp_is_post_revision( $post_id );
	$is_valid_nonce = ( isset( $_POST[ 'wpds_nonce' ] ) && wp_verify_nonce( $_POST[ 'wpds_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

	// Exits script depending on save status
	if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
		return;
	}

	// Checks for input and sanitizes/saves if needed
	if( isset( $_POST[ 'subtitle' ] ) ) {
		update_post_meta( $post_id, 'subtitle', sanitize_text_field( $_POST[ 'subtitle' ] ) );
	}
	if( isset( $_POST[ 'link' ] ) ) {
		update_post_meta( $post_id, 'link', sanitize_text_field( $_POST[ 'link' ] ) );
	}

	// Checks for input and saves if needed
	if( isset( $_POST[ 'video-link' ] ) ) {
		update_post_meta( $post_id, 'video-link', $_POST[ 'video-link' ] );
	}

	// Checks for input and saves if needed
	if( isset( $_POST[ 'background-color' ] ) ) {
		update_post_meta( $post_id, 'background-color', $_POST[ 'background-color' ] );
	}
	if( isset( $_POST[ 'headline-color' ] ) ) {
		update_post_meta( $post_id, 'headline-color', $_POST[ 'headline-color' ] );
	}
	if( isset( $_POST[ 'subhead-color' ] ) ) {
		update_post_meta( $post_id, 'subhead-color', $_POST[ 'subhead-color' ] );
	}
	if( isset( $_POST[ 'copy-color' ] ) ) {
		update_post_meta( $post_id, 'copy-color', $_POST[ 'copy-color' ] );
	}

	// Checks for input and saves if needed
	if( isset( $_POST[ 'background-image' ] ) ) {
		update_post_meta( $post_id, 'background-image', $_POST[ 'background-image' ] );
	}

}
add_action( 'save_post', 'wpds_meta_save' );


/**
 * Adds the meta box stylesheet when appropriate
 */
function wpds_admin_styles(){
	global $typenow;
	if( $typenow == 'post' ) {
		wp_enqueue_style( 'wpds_meta_box_styles', plugin_dir_url( __FILE__ ) . 'meta-box-styles.css' );
	}
}
add_action( 'admin_print_styles', 'wpds_admin_styles' );


/**
 * Loads the image management javascript
 */
function wpds_image_enqueue() {
	global $typenow;
	if( $typenow == 'post' ) {
		wp_enqueue_media();

		// Registers and enqueues the required javascript.
		wp_register_script( 'meta-box-image', plugin_dir_url( __FILE__ ) . 'meta-box-image.js', array( 'jquery' ) );
		wp_localize_script( 'meta-box-image', 'meta_image',
			array(
				'title' => __( 'Choose or Upload an Image', 'wpds-textdomain' ),
				'button' => __( 'Use this image', 'wpds-textdomain' ),
			)
		);
		wp_enqueue_script( 'meta-box-image' );
	}
}
add_action( 'admin_enqueue_scripts', 'wpds_image_enqueue' );
