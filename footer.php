<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package School_Theme_BCIT
 */

?>

<footer id="colophon" class="site-footer">
	<div class="footer-menus">
		<nav class="footer-navigation-left">
			<?php
			wp_nav_menu(
				array(
					'menu_id' => 'footer-left',
					'theme_location' => 'footer-left',
				)
			);
			?>
		</nav>
		<div class="credits">
			<h3>Credits</h3>
			<?php
			printf('<p>' . esc_html__('Created by %1$s.', 'school-theme-bcit') . '</p>', '<strong><a href="https://emilyhe.ca/school">Ali A, Emily He</a></strong>');
			printf('<p>' . esc_html__('Photos courtesy of %1$s.', 'school-theme-bcit') . '</p>', '<strong><a href="https://burst.shopify.com/">Burst</a></strong>');
			printf('<p>' . esc_html__('Content courtesy of %1$s.', 'school-theme-bcit') . '</p>', '<strong><a href="https://chat.openai.com/">ChatGPT</a></strong>');
			?>
		</div>
		<nav class="footer-navigation-right">
			<h3>Links</h3>
			<?php
			wp_nav_menu(
				array(
					'menu_id' => 'footer-right',
					'theme_location' => 'footer-right',
				)
			);
			?>
		</nav>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>