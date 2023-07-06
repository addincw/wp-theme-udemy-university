    <footer class="site-footer">
        <div class="site-footer__inner container container--narrow">
            <?php get_template_part('template-parts/navigation/navbar-bottom'); ?>
        </div>
    </footer>

    <?php get_template_part('template-parts/navigation/search-dialog'); ?>

    <?php get_template_part('template-parts/content/note-dialog', null, ['show_page_link' => true]) ?>

    <?php wp_footer(); ?>
    </body>

    </html>