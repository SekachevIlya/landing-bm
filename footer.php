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
    <div class="container">
        <hr />

        <div class="row">
            <div class="column col-6 col-md-6 col-lg-3">
                <div class="column-inner">
                    <h4 class="footer-title">Contact Us</h4>

                    <ul>
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">Legal & Privacy</a>
                        </li>
                        <li>
                            <a href="#">News & Media</a>
                        </li>
                        <li>
                            <a href="#">Contact</a>
                        </li>

                    </ul>
                </div>
            </div>
            <div class="column col-6 col-md-6 col-lg-3">
                <div class="column-inner">
                    <h4 class="footer-title">Product</h4>

                    <ul>
                        <li>
                            <a href="#">Spot Trade</a>
                        </li>
                        <li>
                            <a href="#">Margin Trade</a>
                        </li>
                        <li>
                            <a href="#">Contract (Futures)</a>
                        </li>
                        <li>
                            <a href="#">Bitmelech Debit card</a>
                        </li>
                        <li>
                            <a href="#">IEO</a>
                        </li>
                        <li>
                            <a href="#">Token Listing</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="column col-6 col-md-6 col-lg-3">
                <div class="column-inner">
                    <h4 class="footer-title">Service</h4>

                    <ul>
                        <li>
                            <a href="#">Support Center</a>
                        </li>
                        <li>
                            <a href="#">FAQ</a>
                        </li>
                        <li>
                            <a href="#">Submit a Ticket</a>
                        </li>
                        <li>
                            <a href="#">Fee Identity</a>
                        </li>
                        <li>
                            <a href="#">Verification</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="column col-6 col-md-6 col-lg-3">
                <div class="column-inner">
                    <h4 class="footer-title">Utility</h4>

                    <ul>
                        <li>
                            <a href="#">API</a>
                        </li>
                        <li>
                            <a href="#">FIX</a>
                        </li>
                        <li>
                            <a href="#">System Moniter</a>
                        </li>
                        <li>
                            <a href="#">Wallet</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer__copy">
        <div class="container">
            <div class="content">
                <span class="copyright">
                    @ Bitmelech 2018-2022, All rights reserved
                </span>
                <div class="social">
                    <a class="social--img" href="#" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/social/facebook.svg" alt="">
                    </a>
                    <a class="social--img" href="#" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/social/telegram.svg" alt="">
                    </a>
                    <a class="social--img" href="#" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/social/twitter.svg" alt="">
                    </a>
                    <a class="social--img" href="#" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/social/reddit.svg" alt="">
                    </a>
                    <a class="social--img" href="#" target="_blank">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/social/coinmaster.svg" alt="">
                    </a>
                </div>
            </div>

        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>