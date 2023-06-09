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

$eventDate = get_the_time('d');
$eventMonth = get_the_time('M');
if (get_post_type(get_the_ID()) === 'event') {
    $eventDateTime = date_create(get_field('event_date'));

    if ($eventDateTime) {
        $eventDate = date_format($eventDateTime, 'd');
        $eventMonth = date_format($eventDateTime, 'M');
    }
}
?>
<div class="event-summary">
    <a class="event-summary__date <?php echo $dateConClass; ?> t-center" href="<?php the_permalink() ?>">
        <span class="event-summary__month"><?php echo $eventMonth ?></span>
        <span class="event-summary__day"><?php echo $eventDate ?></span>
    </a>
    <div class="event-summary__content">
        <h5 class="event-summary__title headline headline--tiny">
            <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
        </h5>
        <p><?php echo wp_trim_words(get_the_content(), 14); ?> <a href="<?php the_permalink() ?>" class="nu gray">Read more</a></p>
    </div>
</div>