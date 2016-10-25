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

<!--	Dynamic slide-->
	<div class="row dock">
		<div id="slideshow">
			<?php dynamic_sidebar("Announcement"); ?>
		</div>
<!--		<div id="slideshow">-->
<!--			--><?php //dynamic_sidebar("News and Updates"); ?>
<!--		</div>-->
	</div>
	<div class="row dock">
		<?php dynamic_sidebar("Calendar of Activities"); ?>
		<?php dynamic_sidebar("Gospel of the Day"); ?>
	</div>
	<?php wp_footer(); ?>


<script>

	function autoHeightDiv(element) {
		var elementHeights = $(element).map(function () {
			return $(this).height();
		}).get();

		// Math.max takes a variable number of arguments
		// `apply` is equivalent to passing each height as an argument
		var maxHeight = Math.max.apply(null, elementHeights);

		// Set each height to the max height
		$(element).height(maxHeight);
	};
// 	Custom widget slider start
	jQuery(document).ready(function(){

		autoHeightDiv('#slideshow > div');
		$("#slideshow > div:gt(0)").hide()
		setInterval(function() {
			$('#slideshow > div:first')
				.hide()
				.next()
				.show()
				.end()
				.appendTo('#slideshow');
		},  2000);


//		autoHeightDiv('#slideshow2 > div');
//		$("#slideshow2 > div:gt(0)").hide();
//		setInterval(function() {
//			$('#slideshow2 > div:first')
//				.hide()
//				.next()
//				.show()
//				.end()
//				.appendTo('#slideshow2');
//		},  20000);

	});
// 	Custom widget slider end

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
<footer>
	<p>
		Copyright of STePS
	</p>
</footer>
 </body>
</html>
