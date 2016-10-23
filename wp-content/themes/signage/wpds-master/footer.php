<?php
/**
 * Footer
 *
 * Displays content shown in the footer section
 *
 * @package WordPress
 * @subpackage Foundation, for WordPress
 * @since Foundation, for WordPress 1.0
 */
?>
<!--	<div class="row dock">-->
<!--		--><?php //dynamic_sidebar("Dock"); ?>
<!--	</div>-->

	<div class="row dock">
		<?php dynamic_sidebar("News and Updates"); ?>
		<?php dynamic_sidebar("Announcement"); ?>
		<?php dynamic_sidebar("Calendar of Activities"); ?>
		<?php dynamic_sidebar("Gospel of the Day"); ?>


	</div>


	<?php wp_footer(); ?>


<script>

	$(function() {
		$(document).foundation();
	});

	var ByeBye = "Ninja Slider trial version";

	function removeText(s) {
		var el, els = document.getElementsByTagName('*');
		var node, nodes;

		for (var i=0, iLen=els.length; i<iLen; i++) {
			el = els[i];

			if (el.tagName.toLowerCase() != 'script') {
				nodes = el.childNodes;
			} else {
				nodes = [];
			}

			for (var j=0, jLen=nodes.length; j<jLen; j++) {
				node = nodes[j];

				if (node.nodeType == 3) {
					node.data = node.data.replace(s, '');
				}
			}
		}
	}

	window.onload = function() {
		removeText(ByeBye);
	}
</script>

 </body>
</html>
