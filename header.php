<!doctype html>

<html class="no-js"  <?php language_attributes(); ?>>

    <head>
        <meta charset="utf-8">

        <!-- Force IE to use the latest rendering engine available -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- Mobile Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta class="foundation-mq">

        <!-- If Site Icon isn't set in customizer -->
        <?php if (!function_exists('has_site_icon') || !has_site_icon()) { ?>
            <!-- Icons & Favicons -->
            <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
            <link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />
            <!--[if IE]>
                    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
            <![endif]-->
            <meta name="msapplication-TileColor" content="#f01d4f">
            <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/assets/images/win8-tile-icon.png">
            <meta name="theme-color" content="#121212">
        <?php } ?>

        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

        <?php wp_head(); ?>

        <!-- Drop Google Analytics here -->
        <!-- end analytics -->

    </head>

    <!-- Uncomment this line if using the Off-Canvas Menu --> 

    <body <?php body_class(); ?>>

        <div class="off-canvas-wrapper">

            <?php get_template_part('parts/content', 'offcanvas'); ?>

            <div class="off-canvas-content" data-off-canvas-content>

                <header class="header" role="banner">

                    <!-- This navs will be applied to the topbar, above all content 
                             To see additional nav styles, visit the /parts directory -->
                    <?php get_template_part('parts/nav', 'offcanvas-topbar'); ?>

                </header> <!-- end .header -->
                <?php if (!is_front_page()): ?>
                    <div class="custom-header" class="row">
                        <?php

                        function custom_header_image() {
                            if (is_post_type_archive('agenda')) {
                                echo '/wp-content/uploads/2017/02/Chagall_Coupe36CoupoleOpera_hd-1-1024x1024.jpg';
                            } else {
                                return the_post_thumbnail_url('large');
                            }
                        }
                        ?>
                        <h1>
                        <?php if (is_archive()) : ?> 
                            <?php post_type_archive_title(); ?>
                            <?php else: ?>
                                <?php the_title(); ?>
                            <?php endif ?>
                            <div class="overlay" style="background-image: url(<?php custom_header_image() ?>);"></div>
                        </h1>
                    </div> <!-- end article header -->
<?php endif; ?>
