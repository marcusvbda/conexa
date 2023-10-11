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
        <section class="top-banner" style="<?php make_api_bg_vars('image_banner_top', false, [
                                                'image_banner_top_mobile' => "url('/wp-content/uploads/2023/10/Screenshot-2023-10-11-at-06.23.36-e1697017204473.png')"
                                            ]); ?>">
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
            <a href="<?php the_field('create_account_url') ?>" class="btn-enter-account">Entrar ou criar conta</a>
        </section>
        <section class="top-banner-2-mobile" style="<?php make_api_bg_vars('image_banner_top_mobile'); ?>">
            <img class="pranchetas" src="<?php themePath('/assets/images/pranchetas-corporate.svg'); ?>" alt="" />
            <a href="<?php the_field('create_account_url') ?>" class="btn-enter-account">
                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4641 21.9627C9.68806 21.9627 7.38988 24.1294 7.38988 26.983C7.38988 27.5447 6.92965 28 6.36193 28C5.79421 28 5.33398 27.5447 5.33398 26.983C5.33398 22.976 8.58327 19.9287 12.4641 19.9287H19.5372C23.5872 19.9287 26.6673 23.1434 26.6673 26.983C26.6673 27.5447 26.2071 28 25.6394 28C25.0717 28 24.6114 27.5447 24.6114 26.983C24.6114 24.2365 22.4214 21.9627 19.5372 21.9627H12.4641Z" fill="#FFFFFA" />
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19.5062 7.41434C17.5489 5.60257 14.5756 5.60613 12.6223 7.42501C10.7413 9.17648 10.7842 12.224 12.6668 14.203C14.4371 16.064 17.5174 16.0215 19.5177 14.159C21.4227 12.3851 21.4592 9.35812 19.5062 7.41434ZM20.9394 5.92248C18.1811 3.35792 13.9533 3.35918 11.1965 5.92625C8.3621 8.56556 8.59659 12.9274 11.152 15.6136C13.8196 18.4179 18.2284 18.1859 20.9435 15.6577C23.749 13.0453 23.7172 8.67384 20.9699 5.95171C20.9649 5.94677 20.9599 5.94188 20.9549 5.93702C20.9498 5.93211 20.9446 5.92726 20.9394 5.92248Z" fill="#FFFFFA" />
                </svg>
            </a>
        </section>
    </section>
    <script src='<?php themePath('/assets/js/vue3.min.js'); ?>'></script>
    <script src='<?php themePath('/assets/js/navbar-menu.js'); ?>'></script>
    <script src='<?php themePath('/assets/js/corporate.js'); ?>'></script>
    <?php require_once('components/footer.php'); ?>
</body>
<?php get_footer(); ?>

</html>