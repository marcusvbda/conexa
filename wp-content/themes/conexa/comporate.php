<?php /* Template Name: lp-corporate */ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title><?php the_field('title'); ?></title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php themePath('/assets/styles/main.min.css'); ?>">
    <link rel="stylesheet" href="<?php themePath('/assets/styles/corporate.min.css'); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src='<?php themePath("/assets/js/main.js"); ?>'></script>
    <link rel="icon" href="<?php themePath('/favicon.ico'); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php themePath('/favicon.ico'); ?>" type="image/x-icon">
</head>

</html>

<body id="for_you_company">
    <?php get_header(); ?>
    <?php require_once('components/menu.php'); ?>
    <section id="corporate">
        <section class="top-banner" style="<?php make_api_bg_vars('image_banner_top'); ?>">
            <div class="top-banner-content">
                <h1><?php the_field('banner_top_text'); ?></h1>
                <small><?php the_field('banner_top_subtext'); ?></small>
            </div>
            <div class="top-banner-boxes-tabs">
                <a href="#" @click.prevent="selectTopBarnnerTab('company')" :class="`primary ${getMenuTobarBoxVisible('company')}`">Para empresas</a>
                <a href="#" @click.prevent="selectTopBarnnerTab('for-you')" :class="`secondary ${getMenuTobarBoxVisible('for-you')}`">Para você</a>
            </div>
            <div class="top-banner-boxes">
                <div :class="`top-banner-box primary ${getMenuTobarBoxVisible('company')}`">
                    <h4>Para empresas</h4>
                    <span><?php the_field("top_banner_card_1_description"); ?></span>
                    <div class="top-banner-box-btn">
                        <a href="<?php the_field("top_banner_corporate_url"); ?>">Corporate</a>
                        <a href="<?php the_field("top_banner_small_companies_url"); ?>">Para pequenas empresas</a>
                    </div>
                </div>
                <div :class="`top-banner-box secondary ${getMenuTobarBoxVisible('for-you')}`">
                    <h4>Para você</h4>
                    <span><?php the_field("top_banner_card_2_description"); ?></span>
                    <div class="top-banner-box-btn">
                        <a href="<?php the_field("top_banner_active_url"); ?>">Quero ativar meu benefício</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="top-banner-2-mobile" style="<?php make_api_bg_vars('image_banner_top_mobile'); ?>"></section>
    </section>
    <script src='<?php themePath('/assets/js/vue3.min.js'); ?>'></script>
    <script src='<?php themePath('/assets/js/navbar-menu.js'); ?>'></script>
    <script src='<?php themePath('/assets/js/corporate.js'); ?>'></script>
    <?php require_once('components/footer.php'); ?>
</body>
<?php get_footer(); ?>

</html>