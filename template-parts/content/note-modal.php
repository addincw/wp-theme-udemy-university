<?php

/**
 * @param mixed[] $args Array options to modified appearance.
 *                      - show_page_link => boolean, Default use false.
 */
?>
<div class="create-note-modal create-note-modal--show">
    <div class="create-note-modal__content">
        <button class="create-note-modal__close" type="button">
            &times;
        </button>

        <div class="create-note">
            <h2 class="headline headline--medium">Create New Note</h2>

            <input class="new-note-title" placeholder="Title">
            <textarea class="new-note-body" placeholder="Your note here..."></textarea>

            <button class="submit-note">Create Note</button>

            <span class="note-limit-message">
                Note limit reached: delete an existing note to make room for a new one.
            </span>

            <?php if (isset($args['show_page_link']) && $args['show_page_link']) : ?>
                <p style="padding-top: 16px; text-align: right;">
                    <a href="<?php echo site_url('/my-notes'); ?>">view notes that have been saved →</a>
                </p>
            <?php endif; ?>
        </div>
    </div>
</div>