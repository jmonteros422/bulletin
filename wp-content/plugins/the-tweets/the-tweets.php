<?php

/*
Plugin Name: The Tweets
Plugin URI: http://pixelydo.com/work/wordpress-digital-signage/
Description: The twitter for WPDS. Original project page: www.jasonmayes.com/projects/twitterApi
Author: Nate Jones
Version: 1.0
Author URI: http://pixelydo.com/
*/


class twitter_plugin extends WP_Widget {

// constructor
		function twitter_plugin() {
				parent::WP_Widget(false, $name = __('The Tweets', 'wp_widget_plugin') );
		}

// widget form creation
function form($instance) {

// Check values
if( $instance) {
     $twitterID = esc_attr($instance['twitterID']);
} else {
     $twitterID = '';
}
?>

<p>
	<label for="<?php echo $this->get_field_id('twitterID'); ?>"><?php _e('Twitter widget ID', 'wp_widget_plugin'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('twitterID'); ?>" name="<?php echo $this->get_field_name('twitterID'); ?>" type="text" value="<?php echo $twitterID; ?>" />
</p>
<ul>
	<li>Go to <a href="https://twitter.com" target="_blank">Twitter</a>, and sign in as normal</li>
	<li>Go to your settings page.</li>
	<li>Go to <em>Widgets</em> on the left hand side.</li>
	<li>Create a new widget for what you need eg "user timeline" or "search" etc.</li>
	<li>Feel free to check "exclude replies" if you dont want replies in results.</li>
	<li>Now go back to settings page, and then go back to widgets page, you should see the widget you just created. Click edit.</li>
	<li>Now look at the URL in your web browser, you will see a long number like this: <em>345735908357048478</em>.</li>
	<li>Use this as your ID above.</li>
</ul>

<?php
}

// update widget
function update($new_instance, $old_instance) {
      $instance = $old_instance;
      // Fields
      $instance['twitterID'] = strip_tags($new_instance['twitterID']);
     return $instance;
}
// display widget
			function widget($args, $instance) {
				extract( $args );
				// these are the widget options
				$twitterID = $instance['twitterID'];
				echo $before_widget;
				// Display the widget
				echo '<link rel="stylesheet" href="'. plugins_url( 'twitter.css' , __FILE__ ) .'">';
				echo '<script src="'. plugins_url( 'twitterFetcher_v10_min.js' , __FILE__ ) .'"></script>';
				echo '<script>$(function() {$(document).foundation();});twitterFetcher.fetch("' . $twitterID . '", "tweets", 1, true, true, false);</script>';
				echo '<div id="tweets"></div>';
				echo $after_widget;
			}
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("twitter_plugin");'));
