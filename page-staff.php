<?php
/**
 * The template for displaying staff page
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

<main id="primary" class="site-main staff-page">

	<header class="staff-page-header">
		<h1 class="staff-entry-title">Our Staff</h1>
	</header><!-- .page-header -->

	<section class="staff-entry-content">
		<!-- There was no requirement to output the entry content as ACF fields... -->
		<p>
			Our dedicated staff is here to help our students succeed. With years of experience and a passion for
			teaching, our faculty and administrative team are committed to providing the support and guidance needed for
			academic success. Whether you have questions about course material, need assistance with administrative
			matters, or simply seek advice and mentorship, we're here to help.
		</p>
		<p>
			Meet our esteemed faculty members who bring a wealth of expertise and knowledge to the classroom. From
			mastering the intricacies of CSS and SASS to delving into the complexities of JavaScript and jQuery, our
			instructors are dedicated to empowering students with the skills they need to thrive in the ever-evolving
			field of web development.
		</p>
		<p>
			Our administrative staff plays a crucial role in ensuring the smooth operation of our coding school. From
			coordinating hackathons and managing events to handling enrollment and administrative tasks, our team works
			tirelessly behind the scenes to provide a seamless learning experience for all students. Reach out to us
			with any questions or concerns, and we'll be happy to assist you on your journey to success.
		</p>
	</section>

	<section class="our-staff">
		<?php
		$terms = get_terms(
			array(
				'taxonomy' => 'school-staff-category',
			)
		);

		if ($terms && !is_wp_error($terms)) {
			foreach ($terms as $term) {
				$args = array(
					'post_type' => 'school-staff',
					'posts_per_page' => -1,
					'order' => 'ASC',
					'orderby' => 'title',
					'tax_query' => array(
						array(
							'taxonomy' => 'school-staff-category',
							'field' => 'slug',
							'terms' => $term->slug,
						)
					),
				);

				$query = new WP_Query($args);

				if ($query->have_posts()) {
					
					// Container for admin staff
					if ($term->slug === 'administrative') {
						echo '<section class="admin-container">';
						echo '<h2>' . esc_html($term->name) . '</h2>';

						while ($query->have_posts()) {
							$query->the_post();

							if (get_field('administrator_biography')) {
								?>
								<article class="admin-staff">
									<h3 id="<?php echo esc_attr(get_the_ID()); ?>">
										<?php esc_html(the_title()); ?>
									</h3>
									<p>
										<?php echo esc_html(get_field('administrator_biography')); ?>
									</p>
								</article>
								<?php
							}
						}
						echo '</section>';
						wp_reset_postdata();
					}

					// Container for instructor staff
					if ($term->slug === 'faculty') {
						echo '<section class="instructor-container">';
						echo '<h2>' . esc_html($term->name) . '</h2>';

						while ($query->have_posts()) {
							$query->the_post();

							if (get_field('instructor_biography') || get_field('instructor_courses') || get_field('instructor_website')) {
								?>
								<article class="instructor-staff">
									<h3 id="<?php echo esc_attr(get_the_ID()); ?>">
										<?php esc_html(the_title()); ?>
									</h3>
									<p>
										<?php echo esc_html(get_field('instructor_biography')); ?>
									</p>
									<p>
										<?php echo esc_html(get_field('instructor_courses')); ?>
									</p>
									<p>
										<a href="<?php echo esc_url(get_field('instructor_website')); ?>">
											<strong>Instrucor Website</strong>
										</a>
									</p>
								</article>
								<?php
							}
						}
						echo '</section>';
						wp_reset_postdata();
					}
				}
			}
		}
		?>
	</section>



</main><!-- #primary -->

<?php
get_footer();
