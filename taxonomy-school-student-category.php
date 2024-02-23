<?php

get_header();
?>

<main id="primary" class="site-main">

    <?php if (have_posts()): ?>

        <header class="page-header">

            <h1>
                <?php single_term_title(); ?>
            </h1>
            <?php
            the_archive_description('<div class="archive-description">', '</div>');
            ?>
        </header><!-- .page-header -->

        <section class="school-students">
            <?php
            while (have_posts()):
                the_post();
                ?>
                <article class="category-individual-student">
                    <a class="student-name" href="<?php the_permalink(); ?>">
                        <h2>
                            <?php the_title(); ?>
                        </h2>
                    </a>
                    <a class="student-image" href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('student-image'); ?>
                    </a>
                    <?php if (get_field('student_description')): ?>
                        <div class="student-description">
                            <p>
                                <?php the_field('student_description'); ?>
                            </p>
                            <?php echo '<strong><a class="nonexistent-page" href="' . home_url() . '/nonexistent-page">' . get_the_title() . ' Portfolio</a></strong>'; ?>
                        </div>
                    <?php endif; ?>
                </article>
                <?php
            endwhile;

            the_posts_navigation();

    else:

        get_template_part('template-parts/content', 'none');

    endif;
    ?>
    </section>

</main><!-- #primary -->

<?php
get_footer();
