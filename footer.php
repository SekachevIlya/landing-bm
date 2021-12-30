<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bitmelech
 */

?>

<footer class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="footer-wrap">
                <div class="footer-block">
                    <h4 class="footer-title">Contact</h4>
                    <?php if( have_rows('contact_footer', 'option') ) { ?>
                    <div class="contacts">
                        <?php while( have_rows('contact_footer', 'option') ) { the_row(); ?>
                        <div class="contacts__item">
                            <span>
                                <?php esc_attr(the_sub_field('сontact_name_footer', 'option')); ?>
                            </span>
                            <a href="mailto:<?php esc_attr(the_sub_field('contact_email_footer', 'option')); ?>"
                                class="contacts__link">
                                <?php esc_attr(the_sub_field('contact_email_footer', 'option')); ?>
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                    <?php } ?>
                </div>
                <div class="footer-block">
                    <h4 class="footer-title">Resources</h4>
                    <?php
                            wp_nav_menu( array(
                                'theme_location' => 'menu-footer-resources',
                                'menu_class'    => 'footer-menu'
                            ) );
                        ?>
                </div>
                <div class="footer-block">
                    <h4 class="footer-title">Company</h4>
                    <?php
                            wp_nav_menu( array(
                                'theme_location' => 'menu-footer-company',
                                'menu_class'    => 'footer-menu'
                            ) );
                        ?>
                </div>
                <div class="footer-block">
                    <h4 class="footer-title">Connect</h4>
                    <?php if( have_rows('connect_footer', 'option') ) { ?>
                    <ul class="footer-menu">
                        <?php while( have_rows('connect_footer', 'option') ) { the_row(); ?>
                        <li class="footer-item">
                            <!--noindex-->
                            <a href="<?php esc_url(the_sub_field('social_network_link_footer', 'option')); ?>"
                                rel="nofollow noopener noreferrer"
                                target="_blank"><?php esc_attr(the_sub_field('social_network_name_footer', 'option')); ?></a>
                            <!--/noindex -->
                        </li>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="footer-bottom">
            <a href="<?php echo home_url(); ?>" class="logo"></a>
            <?php if(get_field('address_footer', 'option')) { ?>
            <div class="adress"><?php esc_attr(the_field('address_footer', 'option')); ?></div>
            <?php } ?>
            <?php if(get_field('copyright_footer', 'option')) { ?>
            <div class="copyright"><?php esc_attr(the_field('copyright_footer', 'option')); ?>
            </div>
            <?php } ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>