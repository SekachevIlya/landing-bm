<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bitmelech
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.svg">
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#080f29">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#080f29">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#080f29">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="header">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="logo__item">

                    <a href="<?php echo home_url(); ?>" class="logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/logo.svg" alt="" />
                    </a>
                </div>
                <div class="d-flex align-items-center">
                    <div class="reg">
                        <a href="#">Register</a>
                    </div>
                    <div>
                        <button class="btn btn--secondary">Login</button>
                    </div>
                </div>

            </div>
        </div>
    </header>