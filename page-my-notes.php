<?php

/**
 * The archive template file
 *
 */

get_header(); ?>

<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('assets/images/ocean.jpg'); ?>)"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">My Note's</h1>
        <div class="page-banner__intro">
            <p>What's up? anything you want to note, just note it. It's private, only for you.</p>
        </div>
    </div>
</div>

<div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
        <p>
            <button class="metabox__blog-home-link create-note-dialog__open">
                <i class="fa fa-sticky-note"></i>
                &nbsp;
                Create new note
            </button>
            <span class="metabox__main">
                <?php
                $totalPosts = wp_count_posts()->publish;
                $displayTotalPosts = $totalPosts > 100 ? '100+' : $totalPosts;

                echo $displayTotalPosts . ' Note\'s you have been create.';
                ?>
            </span>
        </p>
    </div>

    <?php get_template_part('template-parts/content/note-dialog') ?>

    <ul class="min-list link-list" id="my-notes">
        <?php
        $myNotePostType = new MyNotePostType();
        $qMyNotes = $myNotePostType->get_notes();

        while ($qMyNotes->have_posts()) :
            $qMyNotes->the_post();
        ?>
            <div class="generic-content">
                <?php get_template_part('template-parts/content/note-item') ?>
            </div>

            <hr class="section-break" />
        <?php endwhile; ?>
    </ul>

    <div class="pagination t-center">
        <?php echo paginate_links(); ?>
    </div>
</div>

<?php get_footer(); ?>