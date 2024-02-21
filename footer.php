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
		<nav class="footer-navigation">
			<?php
			wp_nav_menu(
				array(
					'menu_id' => 'footer-left',
					'theme_location' => 'footer-left',
				)
			);
			?>
			<!-- <a href="<?php echo esc_url(get_privacy_policy_url()); ?>">Privacy Policy</a>	 -->
		</nav>
		<nav class="footer-navigation">
			<?php
			wp_nav_menu(
				array(
					'menu_id' => 'footer-right',
					'theme_location' => 'footer-right',
				)
			);
			?>
		</nav>
	</div><!-- .footer-menus -->
	<div class="site-info">
		<a href="<?php echo esc_url(__('https://wordpress.org/', 'school-theme-bcit')); ?>">
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */
			printf(esc_html__('Proudly powered by %s', 'school-theme-bcit'), 'WordPress');
			?>
		</a>
		<span class="sep"> | </span>
		<?php
		/* translators: 1: Theme name, 2: Theme author. */
		printf(esc_html__('Theme: %1$s by %2$s.', 'school-theme-bcit'), 'school-theme-bcit', '<a href="https://emilyhe.ca/school">Ali A, Emily He</a>');
		?>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>