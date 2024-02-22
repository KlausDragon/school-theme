<?php
/**
 * The template for displaying the Front Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>

<main id="primary" class="site-main home-page">

	<?php
	while (have_posts()):
		the_post();
		?>

		<section class="home-top">
			<?php
			if (function_exists('get_field')) {
				if (get_field('top_section_heading')) {
					echo "<h1>";
					the_field('top_section_heading');
					echo "</h1>";
				}
				if (get_field('top_section_content')) {
					echo "<p>";
					the_field('top_section_content');
					echo "</p>";
				}
			}
			?>
		</section>

		<figure class="wp-block-image size-large">
			<img src="https://emilyhe.ca/school/wp-content/uploads/2024/02/team-meeting-1024x683.jpg" alt="team-meeting"
				class="wp-image-24" />
		</figure>

		<section class="home-school">

			<section class="home-left">
				<?php
				if (function_exists('get_field')) {
					if (get_field('left_section_heading')) {
						echo "<h2>";
						the_field('left_section_heading');
						echo "</h2>";
					}
					if (get_field('left_section_heading')) {
						echo "<p>";
						the_field('left_section_content');
						echo "</p>";
					}
				}
				?>
			</section>

			<section class="home-right">
				<?php
				if (function_exists('get_field')) {
					if (get_field('right_section_heading')) {
						echo "<h2>";
						the_field('right_section_heading');
						echo "</h2>";
					}
					if (get_field('right_section_content')) {
						echo "<p>";
						the_field('right_section_content');
						echo "</p>";
					}
				}
				?>
			</section>

			<figure class="wp-block-image size-large">
				<img src="https://emilyhe.ca/school/wp-content/uploads/2024/02/drawing-wireframes-1-1024x682.jpg"
					alt="drawing-wireframes-1" class="wp-image-12" />
			</figure>

			<section class="home-bottom">
				<?php
				if (function_exists('get_field')) {
					if (get_field('bottom_section_heading')) {
						echo "<h2>";
						the_field('bottom_section_heading');
						echo "</h2>";
					}
					if (get_field('bottom_section_content')) {
						echo "<p>";
						the_field('bottom_section_content');
						echo "</p>";
					}
				}
				?>
			</section>

			<section class="home-news">
				<h2>
					<?php esc_html_e('Latest News', 'school') ?>
				</h2>
				<div class="home-news-container">
					<?php
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 3
					);

					$blog_query = new WP_Query($args);

					if ($blog_query->have_posts()) {
						while ($blog_query->have_posts()) {
							$blog_query->the_post();
							?>

							<article class="blog-article">
								<a href="<?php the_permalink(); ?>">
									<?php
									the_post_thumbnail('latest-blog-teaser');
									?>
									<h3>
										<?php the_title(); ?>
									</h3>
									<h4>
										<?php echo get_the_date('F j, Y'); ?>
									</h4>
								</a>
							</article>

							<?php
						}
					}
					wp_reset_postdata();
					?>

					<a href="<?php echo esc_url(__('https://emilyhe.ca/school/news', 'school')); ?>">See all News</a>
				</div>
			</section>

			<?php
	endwhile; // End of the loop.
	?>

</main><!-- #primary -->

<?php
get_footer();
