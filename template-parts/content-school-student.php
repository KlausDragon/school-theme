<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package School_Theme_BCIT
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        if (is_singular()) :
            the_title('<h1 class="entry-title">', '</h1>');
        else :
            the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;

        if ('post' === get_post_type()) :
        ?>
            <div class="entry-meta">
                <?php
                school_theme_bcit_posted_on();
                school_theme_bcit_posted_by();
                ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->

    <?php school_theme_bcit_post_thumbnail('student-image'); ?>

    <div class="entry-content">
        <?php
        the_content(
            sprintf(
                wp_kses(
                    __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'school-theme-bcit'),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                wp_kses_post(get_the_title())
            )
        );

        if (get_field('student_description')) : ?>
            <div class="student-description">
                <?php the_field('student_description'); ?>
            </div>
        <?php endif;

        echo '<strong><a href="' . home_url() . '/nonexistent-page">' . get_the_title() . ' Portfolio</a></strong>';
        ?>

        <div class="other-students">
            <?php
            $terms = wp_get_post_terms(get_the_ID(), 'school-student-category', array("fields" => "all"));
            $current_term_name = !empty($terms) && is_array($terms) ? $terms[0]->name : 'developers';

            echo '<h3>Meet other ' . esc_html($current_term_name) . ':</h3>';

            $student_args = array(
                'post_type' => 'school-student',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'school-student-category',
                        'field'    => 'slug',
                        'terms'    => isset($terms[0]->slug) ? $terms[0]->slug : '',
                    ),
                ),
                'posts_per_page' => -1,
                'post__not_in' => array(get_the_ID()),
            );

            $student_query = new WP_Query($student_args);
            if ($student_query->have_posts()) {
                echo '<ul>';
                while ($student_query->have_posts()) {
                    $student_query->the_post();
                    echo '<li><a href="' . esc_url(get_permalink()) . '">' . get_the_title() . '</a></li>';
                }
                echo '</ul>';
                wp_reset_postdata();
            } else {
                echo '<p>No other ' . esc_html($current_term_name) . ' found.</p>';
            }
            ?>
        </div>


        <?php
        wp_link_pages(
            array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'school-theme-bcit'),
                'after' => '</div>',
            )
        );
        ?>

    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php school_theme_bcit_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->