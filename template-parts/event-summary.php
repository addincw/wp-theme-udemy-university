<?php

/**
 * @param mixed[] $args Array options to modified appearance.
 *                      - date_style => 'primary' | 'beige', Default use 'primary'.
 */
$dateConClass = '';
if (isset($args['date_style'])) {
    if ($args['date_style'] === 'beige') {
        $dateConClass = 'event-summary__date--beige';
    }
}
?>
<div class="event-summary">
    <a class="event-summary__date <?php echo $dateConClass; ?> t-center" href="<?php the_permalink() ?>">
        <span class="event-summary__month"><?php the_time('M') ?></span>
        <span class="event-summary__day"><?php the_time('d') ?></span>
    </a>
    <div class="event-summary__content">
        <h5 class="event-summary__title headline headline--tiny">
            <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
        </h5>
        <p><?php echo wp_trim_words(get_the_content(), 14); ?> <a href="<?php the_permalink() ?>" class="nu gray">Read more</a></p>
    </div>
</div>