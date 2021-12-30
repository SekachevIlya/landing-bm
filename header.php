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
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.svg">
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#1B1B1B">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#1B1B1B">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#1B1B1B">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="header">
        <div class="navbar">
            <div class="container">
                <a href="<?php echo home_url(); ?>" class="logo"></a>
                <?php
				    wp_nav_menu( array(
				        'theme_location' => 'menu-header',
				        'menu_class'    => 'menu'
				    ) );
			    ?>
                <div class="navbar__wrap">
                    <?php if(get_field('first_btn_name_header', 'option') || get_field('link_first_btn_header', 'option')) { ?>
                    <a href="<?php esc_url(the_field('link_first_btn_header', 'option')); ?>" class="button-signin"
                        rel="nofollow noopener noreferrer"
                        target="_blank"><?php esc_attr(the_field('first_btn_name_header', 'option')); ?></a>
                    <?php } ?>
                    <?php if(get_field('second_btn_name_header', 'option') || get_field('link_second_btn_header', 'option')) { ?>
                    <a href="<?php esc_url(the_field('link_second_btn_header', 'option')); ?>"
                        class="button button_join" rel="nofollow noopener noreferrer"
                        target="_blank"><?php esc_attr(the_field('second_btn_name_header', 'option')); ?></a>
                    <?php } ?>
                </div>
                <div class="burger" id="burger"></div>
            </div>
        </div>
        <div class="container">
            <div class="mobile-menu" id="mobile-menu">
                <?php if(get_field('first_btn_name_header', 'option') || get_field('link_first_btn_header', 'option')) { ?>
                <a href="<?php esc_url(the_field('link_first_btn_header', 'option')); ?>" class="button-signin"
                    rel="nofollow noopener noreferrer"
                    target="_blank"><?php esc_attr(the_field('first_btn_name_header', 'option')); ?></a>
                <?php } ?>
                <?php if(get_field('second_btn_name_header', 'option') || get_field('link_second_btn_header', 'option')) { ?>
                <a href="<?php esc_url(the_field('link_second_btn_header', 'option')); ?>" class="button-join"
                    rel="nofollow noopener noreferrer"
                    target="_blank"><?php esc_attr(the_field('second_btn_name_header', 'option')); ?></a>
                <?php } ?>
                <?php
				    wp_nav_menu( array(
				        'theme_location' => 'menu-header',
				        'menu_class'    => 'menu'
				    ) );
			    ?>
            </div>
            <div class="offer">
                <?php if(get_field('start_of_the_offer_title') || get_field('middle_of_the_offer_title') || get_field('end_of_the_offer_title')) { ?>
                <h1 class="offer__title"><?php esc_attr(the_field('start_of_the_offer_title')); ?>
                    <span><?php esc_attr(the_field('middle_of_the_offer_title')); ?></span>
                    <?php the_field('end_of_the_offer_title'); ?>
                </h1>
                <?php } ?>
                <?php if(get_field('desc_of_the_offer')) { ?>
                <div class="offer__desc"><?php esc_attr(the_field('desc_of_the_offer')); ?></div>
                <?php } ?>
                <div class="offer__wrap">
                    <?php if(get_field('first_btn_link_offer') || get_field('first_btn_name_offer')) { ?>
                    <!--noindex-->

                    <a href="<?php esc_url(the_field('first_btn_link_offer')); ?>" class="button offer__button"
                        rel="nofollow noopener noreferrer" target="_blank">
                        <?php esc_attr(the_field('first_btn_name_offer')); ?></a>
                    <?php } ?>

                    <a href="" class="button offer__button" rel="nofollow noopener noreferrer" target="_blank">
                        View All Markets


                        <?php esc_attr(the_field('second_btn_name_offer')); ?>


                    </a>

                </div>
            </div>
        </div>
        <?php if( have_rows('listCurrencies', 'option') ) { ?>
        <div class="swiper-container coins-slider">
            <div class="swiper-wrapper">
                <?php while( have_rows('listCurrencies', 'option') ) { the_row(); ?>
                <div class="swiper-slide">
                    <div class="coins-slide"
                        style="background-image: url(<?php esc_url(the_sub_field('iconCurrency', 'option')); ?>)">
                        <?php if(get_sub_field('currencyID', 'option')) { ?>
                        <span class="coins-name">
                            <?php
                                $short_name = str_replace(array('USDT', 'USD'), '', get_sub_field('currencyID', 'option')); 
                                echo $short_name; ?>/USDT
                        </span>
                        <?php } ?>
                        <span class="coins-price">$<span class="coins-price-slide-num">0</span></span>
                        <span class="coins-rate coins-rate-slide coins-rate_plus"><span
                                class="coins-rate-slide-num">0</span>%</span>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <?php } ?>
    </header>