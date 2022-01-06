<?php get_header(); ?>

<section class="home--first-section">
    <div class="container">
        <div class="content">
            <h1 class="header heading text-white">Trade crypto with BitMelech</h1>

            <p class="description text-gray">One sophisticated and user friendly platform to buy, sell and trade hundreds of cryptocurrencies. Large volumes and low fees.</p>

            <p>
                <a href="<?php esc_url(the_field('first_btn_link_offer')); ?>" class="button offer__button" rel="nofollow noopener noreferrer" target="_blank">
                    <?php esc_attr(the_field('first_btn_name_offer')); ?></a>
            </p>

            <!-- <?php if (get_field('start_of_the_offer_title') || get_field('middle_of_the_offer_title') || get_field('end_of_the_offer_title')) { ?>
                <h1 class="offer__title"><?php esc_attr(the_field('start_of_the_offer_title')); ?>
                    <span><?php esc_attr(the_field('middle_of_the_offer_title')); ?></span>
                    <?php the_field('end_of_the_offer_title'); ?>
                </h1>
            <?php } ?>
            <?php if (get_field('desc_of_the_offer')) { ?>
                <div class="offer__desc"><?php esc_attr(the_field('desc_of_the_offer')); ?></div>
            <?php } ?>
            <div class="offer__wrap">
                <?php if (get_field('first_btn_link_offer') || get_field('first_btn_name_offer')) { ?>
                    
            <a href="<?php esc_url(the_field('first_btn_link_offer')); ?>" class="button offer__button" rel="nofollow noopener noreferrer" target="_blank">
                <?php esc_attr(the_field('first_btn_name_offer')); ?></a>
        <?php } ?>

        <a href="<?php esc_url(the_field('second_btn_name_offer')); ?>" class="button offer__button" rel="nofollow noopener noreferrer" target="_blank">
            <?php esc_attr(the_field('second_btn_name_offer')); ?>
        </a>
        </div> -->
            <!-- </div> -->
        </div>
        <?php if (have_rows('listCurrencies', 'option')) : ?>
            <div class="swiper-container coins-slider">
                <div class="swiper-wrapper">
                    <?php while (have_rows('listCurrencies', 'option')) : the_row(); ?>
                        <div class="swiper-slide">
                            <div class="coins-slide" style="background-image: url(<?php esc_url(the_sub_field('iconCurrency', 'option')); ?>)">
                                <?php if (get_sub_field('currencyID', 'option')) { ?>
                                    <span class="coins-name">
                                        <?php
                                        $short_name = str_replace(array('USDT', 'USD'), '', get_sub_field('currencyID', 'option'));
                                        echo $short_name; ?>/USDT
                                    </span>
                                <?php } ?>
                                <span class="coins-price">$<span class="coins-price-slide-num">0</span></span>
                                <span class="coins-rate coins-rate-slide coins-rate_plus"><span class="coins-rate-slide-num">0</span>%</span>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
</section>

<section class="start bg-dark" id="start">
    <div class="container">
        <?php if (get_field('section_title_stages') || get_field('highlighted_text_in_the_stages_title')) { ?>
            <h2 class="heading text-white">
                BTC, ETH and most value 24h or 7d
            </h2>
        <?php } ?>
        <!-- <?php if (have_rows('initial_steps')) { ?>
            <div class="steps">
                <?php while (have_rows('initial_steps')) {
                        the_row(); ?>
                    <div class="steps__item">
                        <?php if (get_sub_field('step_icon_start')) { ?>
                            <span class="steps__icon" style="background-image: url('<?php esc_url(the_sub_field('step_icon_start')); ?>')"></span>
                        <?php } ?>
                        <h3 class="steps__title"><?php esc_attr(the_sub_field('step_name_start')); ?></h3>
                    </div>
                <?php } ?>
            </div>
        <?php } ?> -->
        <?php if (have_rows('listCurrencies', 'option')) { ?>
            <table class="coinschart">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Last price</th>
                        <th>24 Change</th>
                        <th>Markets</th>
                    </tr>
                </thead>
                <tbody id="coinschart-body">
                    <?php while (have_rows('listCurrencies', 'option')) {
                        the_row(); ?>
                        <tr>
                            <td>
                                <?php if (get_sub_field('iconCurrency', 'option')) { ?>
                                    <span class="coins-icon" style="background-image: url(<?php esc_url(the_sub_field('iconCurrency', 'option')); ?>)"></span>
                                <?php } ?>
                                <?php if (get_sub_field('currencyName', 'option')) { ?>
                                    <span class="coins-name"><?php esc_attr(the_sub_field('currencyName', 'option')); ?></span>
                                <?php } ?>
                            </td>
                            <td><span class="coins-price">$<span class="coins-price-table-desktop-num">0</span></span></td>
                            <td><span class="coins-rate coins-rate-table-desktop coins-rate_plus"><span class="coins-rate-table-desktop-num">0</span>%</span></td>
                            <td>
                                <?php
                                $currency_ID = mb_strtolower(get_sub_field('currencyID', 'option'));
                                if (get_sub_field('currencyID', 'option')) { ?>
                                    <div class="coins-chart"><canvas class="coins-chart" id="<?php echo $currency_ID; ?>" width="100%" height="33"></canvas></div>
                                <?php } ?>
                            </td>
                            <!-- <td>
                                <?php if (get_field('link_buy_currencies', 'option')) {
                                    $short_name_currency = str_replace(array('usdt', 'usd'), '', $currency_ID);
                                ?>
                                    <a href="<?php esc_url(the_field('link_buy_currencies', 'option'));
                                                echo $short_name_currency; ?>-to-usdt" class="button button_buy" rel="nofollow noopener" target="_blank">
                                        Buy
                                    </a>
                                <?php } ?>
                            </td> -->
                            <!-- <td hidden>
                                <span class="coins-price">$<span class="coins-price-table-mob-num">0</span></span>
                                <span class="coins-rate coins-rate-table-mob coins-rate_plus"><span class="coins-rate-table-mob-num">0</span>%</span>
                            </td> -->
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>

    </div>
</section>

<section class="making-bitmelech">
    <div class="container">
        <h2 class="heading">Making your first steps with BitMelech</h2>

        <div class="making-block mt50">
            <div class="col">
                <div class="making bg-brown">
                    <div>
                        <span>Getting signed in</span>
                    </div>
                    <div>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/making-1.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="making bg-dark__blue">
                    <div>
                        <span>KYC</span>
                    </div>
                    <div>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/making-2.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="making bg-dark__blue">
                    <div>
                        <span>Buy your first crypto</span>
                    </div>
                    <div>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/making-3.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="trade bg-dark">
    <div class="container">
        <h2 class="heading text-white">Trade with Comfort and Ease</h2>

        <div class="tabs">
            <span role="button" class="active" id="simple">Simple interface</span>
            <span role="button" id="advanced">Advanced interface</span>
        </div>

        <div class="content">
            <div class="left">
                <div class="graphic-item">
                    <img class="graphic-item--bg-image" src="<?php echo get_template_directory_uri(); ?>/assets/img/graphics/waves.png" alt="Graphic's background">

                    <div class="phone simple">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/graphics/phone.png" alt="" />
                    </div>
                </div>
            </div>
            <div class="right">
                <ul>
                    <li>Mobile</li>
                    <li>Wallets</li>
                    <li>Swap</li>
                    <li>Spot Trading</li>
                    <li>Favourites</li>
                    <li>Web</li>
                    <li>Flexible interface</li>
                </ul>
            </div>
        </div>
    </div>

</section>

<section class="why-bitmelech">
    <div class="container">
        <h2 class="heading">Why BitMelech</h2>

        <div class="row-4 mt50">
            <div class="col">
                <div class="partner-block bg-blue">
                    <div>
                        <span>Fast 24/7 Support</span>
                    </div>

                    <div>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bitmelech-1.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="partner-block bg-blue">
                    <div>
                        <span>Easily Buy Crypto with fiat</span>
                    </div>

                    <div>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bitmelech-2.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="partner-block bg-blue">
                    <div>
                        <span>Visa Crypto Card</span>
                    </div>

                    <div>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bitmelech-3.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="partner-block bg-blue">
                    <div>
                        <span>NFT Marketplace</span>
                    </div>

                    <div>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bitmelech-4.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="partner-block bg-blue">
                    <div>
                        <span>Low fees</span>
                    </div>

                    <div>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bitmelech-5.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="partner-block bg-blue">
                    <div>
                        <span>Advanced trading APIs</span>
                    </div>

                    <div>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bitmelech-6.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="partner-block bg-blue">
                    <div>
                        <span>Security (2FA, biometrics)</span>
                    </div>

                    <div>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bitmelech-7.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="partner-block bg-blue">
                    <div>
                        <span>Legal Compliance (Why KYC)</span>
                    </div>

                    <div>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bitmelech-8.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="partner-block bg-blue">
                    <div>
                        <span>24h trading volumes</span>
                    </div>

                    <div>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bitmelech-9.png" alt="">
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="partner-block bg-blue">
                    <div>
                        <span>IEO</span>
                    </div>

                    <div>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bitmelech-10.png" alt="">
                    </div>
                </div>
            </div>
        </div>
</section>

<section class="partners">
    <div class="container">
        <h2 class="heading">Our Partners</h2>

        <div class="row-4 mt50">
            <div class="col">

                <div class="partner-block bg-black">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-partners.png" alt="">
                </div>
            </div>
            <div class="col">
                <div class="partner-block bg-black">
                    <span>LOGO</span>
                </div>
            </div>
            <div class="col">
                <div class="partner-block bg-black">
                    <span>LOGO</span>
                </div>
            </div>
            <div class="col">
                <div class="partner-block bg-black">
                    <span>LOGO</span>
                </div>
            </div>
            <div class="col">
                <div class="partner-block bg-black">
                    <span>LOGO</span>
                </div>
            </div>
            <div class="col">
                <div class="partner-block bg-black">
                    <span>LOGO</span>
                </div>
            </div>
            <div class="col">
                <div class="partner-block bg-black">
                    <span>LOGO</span>
                </div>
            </div>
            <div class="col">
                <div class="partner-block bg-black">
                    <span>LOGO</span>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer();
