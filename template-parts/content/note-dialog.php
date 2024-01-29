<?php

/**
 * @param mixed[] $args Array options to modified appearance.
 *                      - show_page_link => boolean, Default use false.
 */
?>
<div class="create-note-dialog">
    <div class="create-note-dialog__content" onclick="event.stopPropagation();">
        <button class="create-note-dialog__close" type="button">
            &times;
        </button>

        <div class="create-note">
            <h2 class="headline headline--medium">Create New Note</h2>

            <form>
                <input class="new-note-title" name="title" placeholder="Title">
                <textarea class="new-note-body" name="content" placeholder="Your note here..."></textarea>

                <button type="button" class="submit-note">Create Note</button>
            </form>


            <span class="create-note__message">
                Note limit reached: delete an existing note to make room for a new one.
            </span>

            <?php if (isset($args['show_page_link']) && $args['show_page_link']) : ?>
                <p style="padding-top: 16px; text-align: right;">
                    <a href="<?php echo site_url('/my-notes'); ?>">view notes that have been saved →</a>
                </p>
            <?php endif; ?>
        </div>

        <div class="create-note__loading">
            <div class="spinner-loader"></div>
        </div>
    </div>
</div>