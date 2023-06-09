<div class="container">
    <h1 class="school-logo-text float-left">
        <a href="<?php echo site_url(); ?>"><strong>Udemy</strong> University</a>
    </h1>
    <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
    <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
    <div class="site-header__menu group">
        <nav class="main-navigation">
            <ul>
                <?php
                $parentPost = get_post_parent(get_the_ID());
                $parentPostSlug = !is_null($parentPost) ? $parentPost->post_name : null;
                ?>
                <li class="<?php echo uu_get_class_nav_item(null, is_page('about-us') || $parentPostSlug === 'about-us'); ?>">
                    <a href="<?php echo site_url('/about-us'); ?>">About Us</a>
                </li>
                <li class="<?php echo uu_get_class_nav_item('program'); ?>">
                    <a href="<?php echo get_post_type_archive_link('program') ?>">Programs</a>
                </li>
                <li class="<?php echo uu_get_class_nav_item('event', is_page('past-events')); ?>">
                    <a href="<?php echo get_post_type_archive_link('event') ?>">Events</a>
                </li>
                <li class="<?php echo uu_get_class_nav_item('campus'); ?>">
                    <a href="<?php echo get_post_type_archive_link('campus') ?>">Campuses</a>
                </li>
                <li class="<?php echo uu_get_class_nav_item('post'); ?>">
                    <a href="<?php echo site_url('/blogs'); ?>">Blog</a>
                </li>
            </ul>
        </nav>
        <div class="site-header__util">
            <?php if (is_user_logged_in()) : ?>
                <a href="#" class="btn btn--small btn--orange float-left push-right create-note-dialog__open">
                    My Notes
                </a>
                <a href="<?php echo wp_logout_url(); ?>" class="btn btn--small  btn--dark-orange float-left btn--with-photo">
                    <span class="site-header__avatar"><?php echo get_avatar(get_current_user_id(), 60); ?></span>
                    <span class="btn__text">Log Out</span>
                </a>
            <?php else : ?>
                <a href="<?php echo wp_login_url(); ?>" class="btn btn--small btn--orange float-left push-right">Login</a>
                <a href="<?php echo wp_registration_url(); ?>" class="btn btn--small btn--dark-orange float-left">Sign Up</a>
            <?php endif; ?>

            <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
        </div>
    </div>
</div>