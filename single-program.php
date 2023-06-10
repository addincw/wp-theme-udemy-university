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

                <?php
                $campusLinks = [];

                /** @var WP_Post[] $campuses */
                $campuses = get_field('available_campuses');
                foreach ($campuses as $campus) {
                    $campusHref = get_permalink($campus->ID);
                    array_push($campusLinks, "<a href=\"{$campusHref}\" title=\"{$campus->post_title}\">{$campus->post_title}</a>");
                }
                ?>
                <span class="metabox__main">
                    Available at campus: <?php echo implode(', ', $campusLinks); ?>
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
    <div class="page-section page-section--white">
        <div class="container container--narrow">
            <h2 class="headline headline--medium"><?php the_title(); ?> Professors:</h2>

            <?php
            $professors = get_field('professors');
            if (is_array($professors) && count($professors) > 0) :
            ?>
                <ul class="professor-cards">
                    <?php
                    /** @var WP_Post $professor */
                    foreach ($professors as $professor) :
                    ?>
                        <li class="professor-card__list-item">
                            <a href="<?php echo get_post_permalink($professor->ID); ?>" class="professor-card">
                                <img class="professor-card__image" src="<?php echo get_the_post_thumbnail_url($professor->ID, 'medium'); ?>" alt="<?php echo $professor->post_title; ?>" />
                                <span class="professor-card__name"><?php echo $professor->post_title; ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else : ?>
                <p class="metabox">Currently there are no lecturers teaching for this program.</p>
            <?php endif; ?>
        </div>
    </div>

<?php
endwhile;

get_footer();
?>