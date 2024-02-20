<?php
get_header();

?>

<main id="primary" class="site-main">

    <header class="page-header">
        <?php
        echo '<h1 class="page-title">' . esc_html__('The Class', 'school-theme-bcit') . '</h1>';
        the_archive_description('<div class="archive-description">', '</div>');
        ?>
    </header><!-- .page-header -->

    <?php
    $args = array(
        'post_type' => 'school-student',
        'posts_per_page' => -1
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) {
        echo '<section>';
        while ($query->have_posts()) {
            $query->the_post();
    ?>
            <article>
                <a href="<?php the_permalink(); ?>">
                    <h2><?php the_title(); ?></h2>
                    <?php the_post_thumbnail('medium'); ?>
                </a>
                <?php if ($student_description = get_field('student_description')) : ?>
                    <p><?php echo school_theme_bcit_custom_acf_excerpt($student_description); ?></p>
                <?php endif; ?>
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
