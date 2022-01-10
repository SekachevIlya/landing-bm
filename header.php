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
    <meta name="theme-color" content="#061728">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#061728">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#061728">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Roboto+Condensed:ital,wght@0,400;0,700;1,300&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="header">

        <div class="container-fluid">
            <div class="logo__item">

                <a href="<?php echo home_url(); ?>" class="logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/icons/logo.svg" alt="" />
                </a>
            </div>
            <div class="reg">
                <a href="#">Register</a>
            </div>
            <div class="log">
                <a href="#">Login</a>
            </div>

        </div>
    </header>