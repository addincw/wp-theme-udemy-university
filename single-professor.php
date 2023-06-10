<?php

/**
 * The single professor template file
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
            <div class="page-banner__intro">
                <p><?php if (has_excerpt()) the_excerpt(); ?></p>
            </div>
        </div>
    </div>

    <div class="container container--narrow page-section">
        <div class="row group">
            <div class="one-third">
                <!-- TODO: issue custom size image not working -->
                <?php the_post_thumbnail(); ?>
            </div>
            <div class="two-thirds">
                <div class="generic-content">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="page-section page-section--beige">
        <div class="container container--narrow generic-content">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia voluptates vero vel temporibus aliquid possimus, facere accusamus modi. Fugit saepe et autem, laboriosam earum reprehenderit illum odit nobis, consectetur dicta. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos molestiae, tempora alias atque vero officiis sit commodi ipsa vitae impedit odio repellendus doloremque quibusdam quo, ea veniam, ad quod sed.</p>
        </div>
    </div> -->

    <!-- programs section -->
    <div class="page-section page-section--white">
        <div class="container container--narrow">
            <h2 class="headline headline--medium">Subject(s) Taught:</h2>

            <ul class="link-list min-list">
                <?php
                $professorPostType = new ProfessorPostType();
                $qProfessorPrograms = $professorPostType->get_programs(get_the_ID());

                while ($qProfessorPrograms->have_posts()) :
                    $qProfessorPrograms->the_post();
                ?>
                    <li>
                        <a href="<?php echo get_the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>

<?php
endwhile;

get_footer();
?>