<?php

/**
 * The archive template file
 *
 */

get_header(); ?>

<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('assets/images/ocean.jpg'); ?>)"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">Event's</h1>
        <div class="page-banner__intro">
            <p>Find your interest, involve with in.</p>
        </div>
    </div>
</div>

<div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
            <span class="metabox__blog-home-link">
                <?php
                $totalPosts = wp_count_posts()->publish;
                $displayTotalPosts = $totalPosts > 100 ? '100+' : $totalPosts;

                echo $displayTotalPosts;
                ?>
            </span>
            <span class="metabox__main">event's which will be held.</span>
        </p>
    </div>

    <?php while (have_posts()) :
        the_post();
    ?>
        <div class="generic-content">
            <?php get_template_part('template-parts/content/event-summary') ?>
        </div>

        <hr class="section-break" />
    <?php endwhile; ?>

    <p>Looking for a recap of past events? <a href="<?php echo site_url('/past-events') ?>">Check out our past events archive</a>.</p>

    <div class="pagination t-center">
        <?php echo paginate_links(); ?>
    </div>
</div>

<?php get_footer(); ?>