<?php

/**
 * The posts template file
 *
 */

get_header(); ?>

<div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('assets/images/ocean.jpg'); ?>)"></div>
    <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title">Get Insights</h1>
        <div class="page-banner__intro">
            <p>news updates about colleges, scholarships, and college life.</p>
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
            <span class="metabox__main">Post's you can found</span>
        </p>
    </div>

    <?php while (have_posts()) :
        the_post();
    ?>
        <div class="generic-content">
            <h4 class="headline">
                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h4>
            <div style="display: flex; justify-content: space-between; margin-bottom: 1.15rem">
                <div>
                    Posted by <?php the_author_posts_link(); ?> | In <?php the_category(','); ?>
                </div>
                <time><?php the_time('d M, Y') ?></time>
            </div>
            <p>
                <?php echo wp_trim_words(get_the_content()); ?>
                <a href="<?php the_permalink() ?>" class="nu gray">Read more</a>
            </p>
        </div>

        <hr class="section-break" />
    <?php endwhile; ?>

    <div class="pagination t-center">
        <?php echo paginate_links(); ?>
    </div>
</div>

<?php get_footer(); ?>