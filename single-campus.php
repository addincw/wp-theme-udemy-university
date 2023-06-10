<?php

/**
 * The single campus template file
 *
 */

get_header();

while (have_posts()) :
    the_post();
?>

    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('assets/images/ocean.jpg'); ?>)"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php the_title(); ?></h1>
            <div class="page-banner__intro">
                <p>
                    <i class="fa fa-map-marker"></i>
                    &nbsp;
                    <?php echo get_field('campus_address'); ?>
                </p>
            </div>
        </div>
    </div>

    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('campus'); ?>">
                    <i class="fa fa-map" aria-hidden="true"></i> See Another Campuses
                </a>
                <span class="metabox__main">
                    <i class="fa fa-phone"></i>
                    &nbsp;
                    <?php echo get_field('campus_telephone'); ?>
                </span>
            </p>
        </div>

        <div class="generic-content">
            <!-- TODO: better if can displaying map -->
            <?php the_content(); ?>
        </div>
    </div>

<?php
endwhile;

get_footer();
?>