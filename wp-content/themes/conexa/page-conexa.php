<?php /* Template Name: lp-conexa */ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title><?php the_field('title'); ?></title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php themePath('/assets/css/main.css'); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src='<?php themePath("/assets/js/main.js"); ?>'></script>
    <link rel="icon" href="<?php themePath('/favicon.ico'); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php themePath('/favicon.ico'); ?>" type="image/x-icon">
</head>

</html>

<body>
    <section id="navbar-and-menu">
        <!-- navbar desktop -->
        <nav class="navbar">
            <a href="/">
                <img class="logo" src="<?php themePath('/assets/images/logo.png'); ?>" />
            </a>
            <ul class="hide-mobile">
                <li>
                    <a :class="`navbar-item ${navbarItemClass('home')}`" href="/">
                        Home
                    </a>
                </li>
                <li>
                    <a :class="`navbar-item`" href="<?php the_field('footer_for_you_company_url') ?>">
                        Para sua empresa
                    </a>
                </li>
                <li>
                    <a :class="`navbar-item`" href="<?php the_field('footer_for_your_operator_url') ?>">
                        Para sua operadora
                    </a>
                </li>
                <li>
                    <a :class="`navbar-item`" href="<?php the_field('footer_for_you') ?>">
                        Para você
                    </a>
                </li>
            </ul>
            <ul class="hide-mobile">
                <li><a class="navbar-item link" href="<?php the_field('create_account_url') ?>">Criar conta</a></li>
                <li>
                    <button class="btn-primary montserrat" @click="goTo('<?php the_field('schedule_url'); ?>')">Agendar consulta</button>
                </li>
            </ul>
            <ul class=" hide-desktop">
                <li>
                    <button class="btn-primary montserrat" @click="goTo('<?php the_field('know_more_url'); ?>')">Saber mais</button>
                </li>
                <li>
                    <a href="#" @click.prevent="toggleMenu">
                        <svg width="19" height="13" viewBox="0 0 19 13" fill="none">
                            <path clip-rule="evenodd" d="M0 0.721955C0 0.32323 0.327177 0 0.730769 0H18.2692C18.6728 0 19 0.32323 19 0.721955C19 1.12068 18.6728 1.44391 18.2692 1.44391H0.730769C0.327177 1.44391 0 1.12068 0 0.721955Z" fill="#0A0A32" />
                            <path clip-rule="evenodd" d="M0 6.5C0 6.10127 0.327177 5.77804 0.730769 5.77804H18.2692C18.6728 5.77804 19 6.10127 19 6.5C19 6.89872 18.6728 7.22195 18.2692 7.22195H0.730769C0.327177 7.22195 0 6.89872 0 6.5Z" fill="#0A0A32" />
                            <path clip-rule="evenodd" d="M0 12.278C0 11.8793 0.327177 11.5561 0.730769 11.5561H18.2692C18.6728 11.5561 19 11.8793 19 12.278C19 12.6768 18.6728 13 18.2692 13H0.730769C0.327177 13 0 12.6768 0 12.278Z" fill="#0A0A32" />
                        </svg>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="dropdown-content-portal">
            <!-- dropdown content will by showed here -->
        </div>
        <!-- navbar desktop -->

        <!-- menu mobile -->
        <div class="menu-mobile" v-if="menu.showing">
            <a href="#" @click.prevent="toggleMenu()" class="close-btn">
                <svg fill="#000000" height="40" viewBox="0 0 24 24" width="40" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 0h24v24H0V0z" fill="none" />
                    <path d="M18 6.41L16.59 5 12 9.59 7.41 5 6 6.41 10.59 11 6 15.59 7.41 17 12 12.41 16.59 17 18 15.59 13.41 11z" />
                </svg>
            </a>
            <a class="menu-mobile-item" href="/">
                Home
            </a>
            <a class="menu-mobile-item" href="<?php the_field('footer_for_you_company_url') ?>">
                Para sua empresa
            </a>
            <a class="menu-mobile-item" href="<?php the_field('footer_for_your_operator_url') ?>">
                Para sua operadora
            </a>
            <a class="menu-mobile-item" href="<?php the_field('footer_for_you') ?>">
                Para você
            </a>
            <a class="menu-mobile-item" href="<?php the_field('create_account_url'); ?>">
                Cria conta
            </a>
            <a class="menu-mobile-item" href="<?php the_field('schedule_url'); ?>">
                Agendar consulta
            </a>
        </div>
        <!-- menu mobile -->
    </section>
    <section id="content"><!-- section will be closed on footer -->
        <section id="banner-1">
            <div class="initial-banner" style="--banner-1 : url('<?php the_field('section_1_banner'); ?>')">
                <div class="initial-banner-content">
                    <div class="initial-banner-content-text">
                        <div class="w-100 md-w-40 container">
                            <div class="initial-banner-content-logo-full">
                                <img src="<?php themePath('/assets/images/logo-full.webp'); ?>" />
                            </div>
                            <h1>
                                <?php the_field('section_1_title'); ?>
                            </h1>
                            <div class="hide-mobile">
                                <span id="typed-banner-1" content="<?php loopToString('section_1_typing_text', 'phrase'); ?>"></span>
                            </div>
                            <div class="hide-desktop">
                                <span>
                                    <?php the_field('section_1_subtitle'); ?>
                                </span>
                            </div>
                            <div class="initial-banner-btn-section">
                                <button class="btn-primary hide-mobile" @click="goTo('<?php the_field('contract_url'); ?>')">Contratar</button>
                                <button class="btn-primary hide-desktop" @click="goTo('<?php the_field('know_more_url'); ?>')">Saber mais</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hide-desktop initial-banner-mobile">
                    <img src="<?php themePath('/assets/images/prancheta.svg'); ?>" class="prancheta" />
                    <img src="<?php the_field('section_1_banner'); ?>" />
                </div>
            </div>

            <div class="reinventing">
                <div class="container">
                    <?php the_field('section_2_title'); ?>
                </div>
                <div class="reinventing-content">
                    <div class="reinventing-counters">
                        <table>
                            <tr class="reinventing-counter-item">
                                <td>
                                    <img src="<?php themePath('/assets/images/reinventing-1-icon.svg'); ?>" />
                                </td>
                                <td>
                                    <div class="reinventing-counters-content">
                                        <?php the_field('section_2_item_1'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr class="reinventing-counter-item">
                                <td>
                                    <img src="<?php themePath('/assets/images/reinventing-2-icon.svg'); ?>" />
                                </td>
                                <td>
                                    <div class="reinventing-counters-content">
                                        <?php the_field('section_2_item_2'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr class="reinventing-counter-item">
                                <td>
                                    <img src="<?php themePath('/assets/images/reinventing-3-icon.svg'); ?>" />
                                </td>
                                <td>
                                    <div class="reinventing-counters-content">
                                        <?php the_field('section_2_item_3'); ?>
                                    </div>
                                </td>
                            </tr>
                            <tr class="reinventing-counter-item">
                                <td>
                                    <img src="<?php themePath('/assets/images/reinventing-4-icon.svg'); ?>" />
                                </td>
                                <td>
                                    <div class="reinventing-counters-content">
                                        <?php the_field('section_2_item_4'); ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="reinventing-image">
                        <img src="<?php the_field('section_2_banner'); ?>" class="reinventing-image-tele" />
                    </div>
                </div>
            </div>
        </section>

        <section id="banner-2">
            <h3><?php the_field('section_3_title'); ?></h3>
            <p class="sec2-description"><?php the_field('section_3_subtitle'); ?></p>
            <div class="sec2-content-card">
                <img src="<?php the_field('section_3_banner'); ?>" class="banner-2" />
                <div class="sec2-content-card-text">
                    <?php the_field('section_3_banner_title'); ?>
                    </h5>

                    <div class="hide-mobile">
                        <?php foreach (loopToArray('section_3_banner_items_desktop', 'item') as $item) : ?>
                            <div class="sec2-item">
                                <div class="logo"></div>
                                <div class="content">
                                    <?php echo $item; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="hide-desktop">
                        <?php foreach (loopToArray('section_3_banner_items_mobile', 'item') as $item) : ?>
                            <div class="sec2-item">
                                <div class="logo"></div>
                                <div class="content">
                                    <?php echo $item; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="btn-primary hide-mobile" @click="goTo('<?php the_field('contract_url'); ?>')">Quero contratar</button>
                    <button class="btn-primary hide-desktop" @click="goTo('<?php the_field('schedule_url'); ?>')">Agendar minha consulta</button>
                </div>
        </section>

        <section id="banner-3">
            <img src="<?php themePath('/assets/images/prancheta_transparent.png'); ?>" class="banner-2-5" />
            <h4><?php the_field('section_4_title'); ?></h4>
            <div class="plan-card">
                <h5><?php the_field('section_4_plan_name'); ?></h5>
                <b><?php the_field('section_4_plan_price'); ?></b>
                <small><?php the_field('section_4_price_subtext'); ?></small>
                <?php foreach (loopToArray('section_4_plan_items', 'item')  as $item) : ?>
                    <div class="plan-item">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M20.7741 5.72846C21.0753 6.03307 21.0753 6.52693 20.7741 6.83154L9.45977 18.2715C9.15851 18.5762 8.67007 18.5762 8.3688 18.2715L3.22595 13.0715C2.92468 12.7669 2.92468 12.2731 3.22595 11.9685C3.52721 11.6638 4.01565 11.6638 4.31691 11.9685L8.91429 16.6169L19.6831 5.72846C19.9844 5.42385 20.4728 5.42385 20.7741 5.72846Z" fill="#1900AF" />
                        </svg>
                        <?php echo $item; ?>
                    </div>
                <?php endforeach; ?>
                <button class="btn-primary" @click="goTo('<?php the_field('contract_url'); ?>')">Contratar</button>
                <small class="primary">*Obs : benefícios <?php the_field('section_4_price_subtext'); ?></small>
            </div>
        </section>

        <section id="banner-2">
            <h3><?php the_field('section_5_title'); ?></h3>
            <div class="sec2-content-card">
                <img src="<?php the_field('section_5_banner'); ?>" class="banner-2" />
                <div class="sec2-content-card-text">
                    <h5><strong><?php the_field('section_5_banner_title'); ?></strong></h5>
                    <?php foreach (loopToArray('section_5_banner_items', 'item') as $item) : ?>
                        <div class="sec2-item">
                            <div class="logo"></div>
                            <div class="content">
                                <strong><?php echo $item; ?></strong>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
        </section>

        <section id="testimonials">
            <img src="<?php themePath('/assets/images/pink-panfleto.svg'); ?>" class="pink-panfleto hide-mobile" />
            <h4><?php the_field('section_6_title'); ?></h4>
            <small><?php the_field('section_6_subtitle'); ?></small>
            <div class="swiper-corporate">
                <div class="swiper-1" scrollbar-hide="true">
                    <div class="swiper-wrapper">
                        <?php foreach (loopToArray('section_6_slide_1_images', 'item') as $item) : ?>
                            <div class="swiper-slide">
                                <img src="<?php echo $item; ?>" />
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="swiper-2" scrollbar-hide="true">
                    <div class="swiper-wrapper">
                        <?php foreach (loopToArray('section_6_slide_2_images', 'item') as $item) : ?>
                            <div class="swiper-slide">
                                <img src="<?php echo $item; ?>" />
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="swiper-testimonails">
                <h5><?php the_field('section_7_title'); ?></h5>
                <div class="swiper-3" scrollbar-hide="true">
                    <div class="swiper-wrapper">
                        <?php foreach (loopToArray('section_7_testimonials', 'item') as $item) : ?>
                            <div class="swiper-slide">
                                <div class="testimonial-card">
                                    <div class="person-id">
                                        <img src="<?php echo $item["avatar"] ?>" />
                                        <div class="name">
                                            <b><?php echo $item["name"]; ?></b>
                                            <small><?php echo $item["position"]; ?></small>
                                        </div>
                                    </div>
                                    <div class="text"><?php echo $item["testimonial"]; ?></div>
                                    <img src="<?php echo $item["company"]; ?>" />
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>

        <section id="lead-form">
            <h5>Preencha o formulário e <b>saiba mais</b></h5>
            <div class="lead-input">
                <label>Nome</label>
                <input type="text" />
            </div>
            <div class="lead-input">
                <label>Sobrenome</label>
                <input type="text" />
            </div>
            <div class="lead-input">
                <label>WhatsApp</label>
                <input type="text" />
            </div>
            <div class="lead-input">
                <label>E-mail corporativo</label>
                <input type="text" />
            </div>
            <div class="lead-input">
                <label>Nome da empresa</label>
                <input type="text" />
            </div>
            <div class="lead-input">
                <label>Cargo</label>
                <input type="text" />
            </div>
            <div class="lead-input">
                <label>Departamento</label>
                <input type="text" />
            </div>
            <div class="description">
                Ao informar meus dados, eu concordo com a Política de Privacidade
            </div>
            <button class="btn-primary">Falar com um consultor</button>
        </section>

        <section id="questions">
            <img src="<?php themePath('/assets/images/prancheta_transparent.png'); ?>" class="float-image" />
            <h5>Ficou com alguma dúvida?</h5>
            <select>
                <option>Lorem ipsum dolor sit amet, consectetur adipiscing elit?</option>
            </select>
            <select>
                <option>Lorem ipsum dolor sit amet, consectetur adipiscing elit?</option>
            </select>
            <select>
                <option>Lorem ipsum dolor sit amet, consectetur adipiscing elit?</option>
            </select>
            <select>
                <option>Lorem ipsum dolor sit amet, consectetur adipiscing elit?</option>
            </select>
        </section>
        <section class="footer">
            <div class="col">
                <img src="<?php themePath('/assets/images/conexa-white.png'); ?>" class="logo" />
                <a href="<?php the_field('footer_for_you_company_url'); ?>">Para a sua empresa</a>
                <a href="<?php the_field('footer_for_your_operator_url'); ?>">Para a sua operadora</a>
                <a href="<?php the_field('footer_for_you'); ?>">Para a você</a>
                <a href="<?php the_field('footer_for_you_company_url'); ?>">Calcule a saúde da sua empresa</a>
            </div>
            <div class="col">
                <a href="<?php the_field('footer_press'); ?>" class="mt-auto">Imprensa</a>
                <a href="<?php the_field('footer_career'); ?>">Carreiras</a>
                <a href="<?php the_field('footer_questions'); ?>">Perguntas frequentes</a>
                <div class="social-row">
                    <a href="<?php the_field('footer_linkedin'); ?>">
                        <img src="<?php themePath('/assets/images/linkedin.svg'); ?>" />
                    </a>
                    <a href="<?php the_field('footer_instagram'); ?>">
                        <img src="<?php themePath('/assets/images/instagram.svg'); ?>" />
                    </a>
                    <a href="<?php the_field('footer_facebook'); ?>">
                        <img src="<?php themePath('/assets/images/facebook.svg'); ?>" />
                    </a>
                </div>
            </div>
            <div class="col center">
                <span><?php the_field('footer_responsible'); ?></span>
            </div>
        </section>
    </section> <!-- section was be opened on header -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src='<?php themePath('/assets/js/typed.min.js'); ?>'></script>
    <script src='<?php themePath('/assets/js/vue3.min.js'); ?>'></script>
    <script src='<?php themePath('/assets/js/main.js'); ?>'></script>
    <script src='<?php themePath('/assets/js/navbar-menu.js'); ?>'></script>
    <script src='<?php themePath('/assets/js/content.js'); ?>'></script>
</body>
<?php get_footer(); ?>

</html>