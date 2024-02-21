<?php

get_header();
?>

<main id="primary" class="site-main">

    <?php if (have_posts()) : ?>

        <header class="page-header">

            <h1><?php single_term_title(); ?></h1>
            <?php
            the_archive_description('<div class="archive-description">', '</div>');
            ?>
        </header><!-- .page-header -->

        <?php
        while (have_posts()) :
            the_post();
        ?>
            <article>
                <a href="<?php the_permalink(); ?>">
                    <h2><?php the_title(); ?></h2>
                    <?php the_post_thumbnail('student-image'); ?>
                </a>
                <?php if (get_field('student_description')) : ?>
                    <div class="student-description">
                        <?php the_field('student_description'); ?>
                    </div>
                <?php endif; ?>
            </article>
    <?php

        endwhile;

        the_posts_navigation();

    else :

        get_template_part('template-parts/content', 'none');

    endif;
    ?>

</main><!-- #primary -->

<?php
get_footer();
