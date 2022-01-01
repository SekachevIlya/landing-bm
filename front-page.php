<?php
get_header();
?>

<section class="home--first-section">
    <div class="container">
        <div class="mobile-menu" id="mobile-menu">
            <?php if (get_field('first_btn_name_header', 'option') || get_field('link_first_btn_header', 'option')) { ?>
                <a href="<?php esc_url(the_field('link_first_btn_header', 'option')); ?>" class="button-signin" rel="nofollow noopener noreferrer" target="_blank"><?php esc_attr(the_field('first_btn_name_header', 'option')); ?></a>
            <?php } ?>
            <?php if (get_field('second_btn_name_header', 'option') || get_field('link_second_btn_header', 'option')) { ?>
                <a href="<?php esc_url(the_field('link_second_btn_header', 'option')); ?>" class="button-join" rel="nofollow noopener noreferrer" target="_blank"><?php esc_attr(the_field('second_btn_name_header', 'option')); ?></a>
            <?php } ?>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'menu-header',
                'menu_class'    => 'menu'
            ));
            ?>
        </div>
        <div class="offer">
            <?php if (get_field('start_of_the_offer_title') || get_field('middle_of_the_offer_title') || get_field('end_of_the_offer_title')) { ?>
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
                    <!--noindex-->
                    <a href="<?php esc_url(the_field('first_btn_link_offer')); ?>" class="button offer__button" rel="nofollow noopener noreferrer" target="_blank">
                        <?php esc_attr(the_field('first_btn_name_offer')); ?></a>
                <?php } ?>

                <a href="<?php esc_url(the_field('second_btn_name_offer')); ?>" class="button offer__button" rel="nofollow noopener noreferrer" target="_blank">
                    <?php esc_attr(the_field('second_btn_name_offer')); ?>
                </a>

            </div>
        </div>
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

<section class="start" id="start">
    <div class="container">
        <?php if (get_field('section_title_stages') || get_field('highlighted_text_in_the_stages_title')) { ?>
            <h2 class="section-heading section-heading_start">
                <?php esc_attr(the_field('section_title_stages')); ?>
                <span><?php esc_attr(the_field('highlighted_text_in_the_stages_title')); ?></span>
            </h2>
        <?php } ?>
        <?php if (have_rows('initial_steps')) { ?>
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
        <?php } ?>
        <?php if (have_rows('listCurrencies', 'option')) { ?>
            <table class="coinschart">
                <thead>
                    <tr>
                        <th>Asset</th>
                        <th>Price</th>
                        <th>Change</th>
                        <th>Chart</th>
                        <th>Trade</th>
                        <th></th>
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
                            <td>
                                <?php if (get_field('link_buy_currencies', 'option')) {
                                    $short_name_currency = str_replace(array('usdt', 'usd'), '', $currency_ID);
                                ?>
                                    <a href="<?php esc_url(the_field('link_buy_currencies', 'option'));
                                                echo $short_name_currency; ?>-to-usdt" class="button button_buy" rel="nofollow noopener" target="_blank">
                                        Buy
                                    </a>
                                <?php } ?>
                            </td>
                            <td>
                                <span class="coins-price">$<span class="coins-price-table-mob-num">0</span></span>
                                <span class="coins-rate coins-rate-table-mob coins-rate_plus"><span class="coins-rate-table-mob-num">0</span>%</span>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } ?>
        <!--noindex-->
        <?php if (get_field('btn_name_behind_table') || get_field('link_btn_behind_table')) { ?>
            <a href="<?php esc_url(the_field('link_btn_behind_table')); ?>" class="button button_start" rel="nofollow noopener noreferrer" target="_blank"><?php esc_attr(the_field('btn_name_behind_table')); ?></a>
        <?php } ?>
        <!--/noindex -->
    </div>
</section>
<?php if (have_rows('advantages')) { ?>
    <section class="benefits" id="benefits">
        <div class="container">
            <div class="benefits-pic" style="background-image: url('<?php echo get_template_directory_uri() ?>/assets/img/benefits-pic.png')">
            </div>
            <ul class="benefits-list">
                <?php while (have_rows('advantages')) {
                    the_row(); ?>
                    <li class="benefits-item">
                        <?php if (get_sub_field('advantage_icon')) { ?>
                            <span class="benefits-icon" style="background-image: url('<?php esc_url(the_sub_field('advantage_icon')); ?>')">
                            </span>
                        <?php } ?>
                        <?php esc_attr(the_sub_field('advantage_title')); ?>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </section>
<?php } ?>
<section class="tools" id="tools">
    <div class="container">
        <h2 class="section-heading section-heading_tools">
            Advanced <span>Trading Tools</span>
        </h2>
        <?php if (have_rows('tools_slider')) { ?>
            <div class="swiper-container tools-slider">
                <div class="swiper-wrapper">
                    <?php while (have_rows('tools_slider')) {
                        the_row(); ?>
                        <div class="swiper-slide">
                            <div class="tools-slide">
                                <div class="tools-card">
                                    <?php if (get_sub_field('tool_name_slide')) { ?>
                                        <h3 class="tools-card__title"><?php esc_attr(the_sub_field('tool_name_slide')); ?>
                                        </h3>
                                    <?php } ?>
                                    <?php if (get_sub_field('tool_desc_slide')) { ?>
                                        <p><?php esc_attr(the_sub_field('tool_desc_slide')); ?></p>
                                    <?php } ?>
                                    <?php if (get_sub_field('link_tool_btn_slide') || get_sub_field('tool_btn_name_slide')) { ?>
                                        <!--noindex-->
                                        <a href="<?php esc_url(the_sub_field('link_tool_btn_slide')); ?>" class="tools-card__link" rel="nofollow noopener noreferrer" target="_blank"><?php esc_attr(the_sub_field('tool_btn_name_slide')); ?></a>
                                        <!--/noindex -->
                                    <?php } ?>
                                </div>
                                <?php if (get_sub_field('tool_image_slide')) { ?>
                                    <div class="tools-pic" style="background-image: url('<?php esc_url(the_sub_field('tool_image_slide')); ?>')"></div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="tools-slider__wrap">
                    <div class="arrow arrow_prev"></div>

                    <div class="swiper-pagination"></div>

                    <div class="arrow arrow_next"></div>
                </div>
            </div>
        <?php } ?>
        <div class="tools-wrapper">
            <!--noindex-->
            <?php if (get_field('name_first_btn_behind_the_slider') || get_field('link_first_btn_behind_slider')) { ?>
                <a href="<?php esc_url(the_field('link_first_btn_behind_slider')); ?>" class="tools-link" rel="nofollow noopener noreferrer" target="_blank"><?php esc_attr(the_field('name_first_btn_behind_the_slider')); ?></a>
            <?php } ?>
            <?php if (get_field('name_second_btn_behind_the_slider') || get_field('link_second_btn_behind_slider')) { ?>
                <a href="<?php esc_url(the_field('link_second_btn_behind_slider')); ?>" class="tools-link" rel="nofollow noopener noreferrer" target="_blank"><?php esc_attr(the_field('name_second_btn_behind_the_slider')); ?></a>
            <?php } ?>
            <!--/noindex -->
        </div>
    </div>
</section>
<section class="security" id="security">
    <div class="container">
        <?php if (get_field('highlighted_text_in_the_title_security') || get_field('section_title_security')) { ?>
            <h2 class="section-heading section-heading_safeguards">
                <span><?php esc_attr(the_field('highlighted_text_in_the_title_security')); ?></span>
                <?php esc_attr(the_field('section_title_security')); ?>
            </h2>
        <?php } ?>
        <?php if (have_rows('security_stages')) { ?>
            <div class="safeguards">
                <?php while (have_rows('security_stages')) {
                    the_row(); ?>
                    <div class="safeguards__item">
                        <?php if (get_sub_field('security_stage_title')) { ?>
                            <h3 class="safeguards__title"><?php esc_attr(the_sub_field('security_stage_title')); ?></h3>
                        <?php } ?>
                        <?php if (get_sub_field('desc_security_stage')) { ?>
                            <p><?php esc_attr(the_sub_field('desc_security_stage')); ?></p>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</section>
<section class="form" id="form">
    <div class="container">
        <div class="security-wrapper">
            <div class="security-pic"></div>
            <div class="subscribe">
                <?php if (get_field('section_title_subscribe')) { ?>
                    <h2 class="section-heading section-heading_safeguards">
                        <?php esc_attr(the_field('section_title_subscribe')); ?></h2>
                <?php } ?>
                <?php echo do_shortcode('[contact-form-7 id="116" html_class="subscribe__form" title="Email collection form"]') ?>
            </div>
        </div>
    </div>
</section>

<section class="why-bitmelech">
    <div class="container">
        <h2 class="heading">Why BitMelech</h2>

        <div class="row-4">
            <div class="col">

                <div class="item bg-black">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-partners.png" alt="">
                </div>
            </div>
            <div class="col">
                <div class="item bg-black">
                    LOGO
                </div>
            </div>
            <div class="col">
                <div class="item bg-black">
                    LOGO
                </div>
            </div>
            <div class="col">
                <div class="item bg-black">
                    LOGO
                </div>
            </div>
            <div class="col">
                <div class="item bg-black">
                    LOGO
                </div>
            </div>
            <div class="col">
                <div class="item bg-black">
                    LOGO
                </div>
            </div>
            <div class="col">
                <div class="item bg-black">
                    LOGO
                </div>
            </div>
            <div class="col">
                <div class="item bg-black">
                    LOGO
                </div>
            </div>
        </div>
    </div>
</section>
<section class="partners">
    <div class="container">
        <h2 class="heading">Our Partners</h2>

        <div class="row-4">
            <div class="col">

                <div class="item bg-black">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-partners.png" alt="">
                </div>
            </div>
            <div class="col">
                <div class="item bg-black">
                    LOGO
                </div>
            </div>
            <div class="col">
                <div class="item bg-black">
                    LOGO
                </div>
            </div>
            <div class="col">
                <div class="item bg-black">
                    LOGO
                </div>
            </div>
            <div class="col">
                <div class="item bg-black">
                    LOGO
                </div>
            </div>
            <div class="col">
                <div class="item bg-black">
                    LOGO
                </div>
            </div>
            <div class="col">
                <div class="item bg-black">
                    LOGO
                </div>
            </div>
            <div class="col">
                <div class="item bg-black">
                    LOGO
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
