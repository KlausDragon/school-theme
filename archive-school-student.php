<?php
get_header();

?>

<main id="primary" class="site-main student-archive">

    <header class="page-header">
        <?php
        echo '<h1 class="page-title">' . esc_html__('The Class', 'school-theme-bcit') . '</h1>';
        the_archive_description('<div class="archive-description">', '</div>');
        ?>
    </header><!-- .page-header -->

    <?php
    $args = array(
        'post_type' => 'school-student',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'title',
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) {
        echo '<section class="school-students">';
        while ($query->have_posts()) {
            $query->the_post();
            ?>
            <article class="individual-student">
                <a href="<?php the_permalink(); ?>">
                    <h2>
                        <?php the_title(); ?>
                    </h2>
                    <?php the_post_thumbnail('student-image'); ?>
                </a>
                <?php if ($student_description = get_field('student_description')): ?>
                    <p>
                        <?php echo school_theme_bcit_custom_acf_excerpt($student_description); ?>
                    </p>
                <?php endif; ?>
                <?php
                $terms = get_the_terms($post->ID, 'school-student-category');
                if ($terms && !is_wp_error($terms)) {
                    $term = $terms[0];
                    $term_link = get_term_link($term);
                    if (!is_wp_error($term_link)) {
                        echo '<p class="specialty">Specialty: <strong><a href="' . esc_url($term_link) . '">' . esc_html($term->name) . '</a></strong></p>';
                    }
                }
                ?>
            </article>
            <?php
        }
        wp_reset_postdata();
        echo '</section>';
    }
    ?>

</main><!-- #main -->

<?php

get_footer();
