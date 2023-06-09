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
                <li class="<?php echo uu_get_class_nav_item('page', is_page('about-us') || $parentPostSlug === 'about-us'); ?>">
                    <a href="<?php echo site_url('/about-us'); ?>">About Us</a>
                </li>
                <li><a href="#">Programs</a></li>
                <li class="<?php echo uu_get_class_nav_item('event'); ?>">
                    <a href="#">Events</a>
                </li>
                <li><a href="#">Campuses</a></li>
                <li class="<?php echo uu_get_class_nav_item('post'); ?>">
                    <a href="<?php echo site_url('/blogs'); ?>">Blog</a>
                </li>
            </ul>
        </nav>
        <div class="site-header__util">
            <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
            <a href="#" class="btn btn--small btn--dark-orange float-left">Sign Up</a>
            <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
        </div>
    </div>
</div>