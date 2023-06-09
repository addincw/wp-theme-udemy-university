<?php

/**
 * The single post template file
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
                <p><?php if (has_excerpt()) the_excerpt(); ?></p>
            </div>
        </div>
    </div>

    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="<?php echo site_url('/blogs'); ?>">
                    <i class="fa fa-rss" aria-hidden="true"></i> See Another Blog
                </a>
                <span class="metabox__main">
                    Created by <?php the_author_posts_link(); ?> on <?php the_time('d M, Y'); ?>. In <?php the_category(','); ?>
                </span>
            </p>
        </div>

        <div class="generic-content">
            <?php the_content(); ?>
        </div>
    </div>

<?php
endwhile;

get_footer();
?>