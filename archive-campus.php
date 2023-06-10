<?php

/**
 * The archive template file
 *
 */

get_header(); ?>

<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('assets/images/ocean.jpg'); ?>)"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">All Campuses</h1>
        <div class="page-banner__intro">
            <p>We have several conveniently located campuses.</p>
        </div>
    </div>
</div>

<div class="container container--narrow page-section">
    <!-- TODO: better if can displaying map -->
    <div class="row group">
        <?php while (have_posts()) :
            the_post();
        ?>
            <div class="one-third generic-content">
                <h4 class="headline">
                    <a class="c-orange" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h4>
                <p style="display: flex;">
                    <i class="fa fa-map-marker" style="margin: 6px 8px 0 0"></i>
                    <?php echo get_field('campus_address'); ?>
                </p>
                <p class="nu-gray">
                    <i class="fa fa-phone"></i>&nbsp;<?php echo get_field('campus_telephone'); ?>
                </p>
            </div>
        <?php endwhile; ?>
    </div>

    <div class="pagination t-center">
        <?php echo paginate_links(); ?>
    </div>
</div>

<?php get_footer(); ?>