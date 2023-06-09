<?php

/**
 * The past events template file
 *
 */

get_header(); ?>

<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('assets/images/ocean.jpg'); ?>)"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">Past Event's</h1>
        <div class="page-banner__intro">
            <p>A recap of our past events.</p>
        </div>
    </div>
</div>

<div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
            <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('event') ?>">
                <i class="fa fa-calendar-o"></i>
                &nbsp;
                See incoming event's
            </a>
        </p>
    </div>

    <?php
    $eventPostType = new EventPostType();
    $qPastEvents = $eventPostType->get_deactive_events();

    while ($qPastEvents->have_posts()) :
        $qPastEvents->the_post();
    ?>
        <div class="generic-content">
            <?php get_template_part('template-parts/event-summary') ?>
        </div>

        <hr class="section-break" />
    <?php endwhile; ?>

    <div class="pagination t-center">
        <?php echo paginate_links(); ?>
    </div>
</div>

<?php get_footer(); ?>