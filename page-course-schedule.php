<?php

/**
 * The template for displaying Schedule page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Theme_BCIT
 */

get_header();
?>

<main id="primary" class="site-main page-schedule">

	<?php
	while (have_posts()) :
		the_post();

		get_template_part('template-parts/content', 'page');

		if (get_field('weekly_course_schedule')) {
			echo '<table class="schedule">';
			echo '<caption>Weekly Course Schedule</caption>';
			echo '<thead><tr>';

			while (have_rows('weekly_course_schedule')) :
				the_row();

				$date_label = get_sub_field_object('date')['label'];
				$course_label = get_sub_field_object('course')['label'];
				$instructor_label = get_sub_field_object('instructor')['label'];


				echo '<th>' . esc_html($date_label) . '</th>';
				echo '<th>' . esc_html($course_label) . '</th>';
				echo '<th>' . esc_html($instructor_label) . '</th>';
				break;
			endwhile;

			echo '</tr></thead>';
			echo '<tbody>';

			while (have_rows('weekly_course_schedule')) :
				the_row();

				$date = get_sub_field('date');
				$course = get_sub_field('course');
				$instructor = get_sub_field('instructor');

				if ($date && $course && $instructor) {

					echo '<tr>';
					echo '<td>' . esc_html($date) . '</td>';
					echo '<td>' . esc_html($course) . '</td>';
					echo '<td>' . esc_html($instructor) . '</td>';
					echo '</tr>';
				}
			endwhile;

			echo '</tbody></table>';
		}

	endwhile;
	?>

</main><!-- #primary -->

<?php
get_footer();
