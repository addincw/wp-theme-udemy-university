<?php

/**
 * The archive template file
 *
 */

get_header(); ?>

<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('assets/images/ocean.jpg'); ?>)"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">All Programs</h1>
        <div class="page-banner__intro">
            <p>There is something for everyone. Have a look around.</p>
        </div>
    </div>
</div>

<div class="container container--narrow page-section">
    <?php while (have_posts()) :
        the_post();
    ?>
        <div class="generic-content">
            <h4 class="headline">
                <a class="c-orange" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h4>
        </div>

        <hr class="section-break" />
    <?php endwhile; ?>

    <div class="pagination t-center">
        <?php echo paginate_links(); ?>
    </div>
</div>

<?php get_footer(); ?>