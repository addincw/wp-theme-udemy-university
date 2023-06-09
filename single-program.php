<?php

/**
 * The single program template file
 *
 */

get_header();

while (have_posts()) :
    the_post();
?>

    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('assets/images/ocean.jpg'); ?>)"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"><?php the_title() ?></h1>
        </div>
    </div>

    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program'); ?>">
                    <i class="fa fa-graduation-cap" aria-hidden="true"></i> See Another Programs
                </a>
                <!-- TODO: add custom post type campus, then adding custom field campus on program -->
                <span class="metabox__main">
                    Available at campus: xxx, xxx
                </span>
            </p>
        </div>

        <div class="generic-content">
            <?php the_content(); ?>
        </div>
    </div>

    <!-- <div class="page-section page-section--beige">
        <div class="container container--narrow generic-content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>
        </div>
    </div> -->

    <!-- professor's section -->
    <!-- <div class="page-section page-section--white">
        <div class="container container--narrow">
            <h2 class="headline headline--medium">Biology Professors:</h2>

            <ul class="professor-cards">
                <li class="professor-card__list-item">
                    <a href="#" class="professor-card">
                        <img class="professor-card__image" src="<?php echo get_theme_file_uri('assets/images/barksalot.jpg'); ?>" />
                        <span class="professor-card__name">Dr. Barksalot</span>
                    </a>
                </li>
                <li class="professor-card__list-item">
                    <a href="#" class="professor-card">
                        <img class="professor-card__image" src="<?php echo get_theme_file_uri('assets/images/meowsalot.jpg'); ?>" />
                        <span class="professor-card__name">Dr. Meowsalot</span>
                    </a>
                </li>
            </ul>
            <hr class="section-break" />

            <div class="row group generic-content">
                <div class="one-third">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>
                </div>

                <div class="one-third">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>
                </div>

                <div class="one-third">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>
                </div>
            </div>
        </div>
    </div> -->

<?php
endwhile;

get_footer();
?>