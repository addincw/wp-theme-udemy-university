<li data-id="<?php the_ID(); ?>">
    <form>
        <input readonly class="note-title-field" name="title" value="<?php echo str_replace('Private: ', '', esc_attr(get_the_title())); ?>">

        <div class="actions">
            <button type="button" class="edit-note">
                <i class="fa fa-pencil" aria-hidden="true"></i>
                &nbsp;
                Edit
            </button>
            <button type="button" class="delete-note">
                <i class="fa fa-trash-o" aria-hidden="true"></i>
                &nbsp;
                Delete
            </button>
        </div>

        <textarea readonly class="note-body-field" name="body"><?php echo esc_textarea(wp_strip_all_tags(get_the_content())); ?></textarea>

        <button type="button" class="update-note btn btn--blue btn--small">
            <i class="fa fa-arrow-right" aria-hidden="true"></i>
            &nbsp;
            Save
        </button>
    </form>

</li>