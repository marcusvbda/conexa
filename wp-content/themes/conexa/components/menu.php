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
                <a :class="`navbar-item ${navbarItemClass('for_you_company')}`" href="<?php the_field('for_you_company_url') ?>">
                    Para sua empresa
                </a>
            </li>
            <li>
                <a :class="`navbar-item ${navbarItemClass('for_you_operator')}`" href="<?php the_field('for_your_operator_url') ?>">
                    Para sua operadora
                </a>
            </li>
            <li>
                <a :class="`navbar-item ${navbarItemClass('for_you')}`" href="<?php the_field('for_you') ?>">
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
        <a class="menu-mobile-item" href="<?php the_field('for_you_company_url') ?>">
            Para sua empresa
        </a>
        <a class="menu-mobile-item" href="<?php the_field('for_your_operator_url') ?>">
            Para sua operadora
        </a>
        <a class="menu-mobile-item" href="<?php the_field('for_you') ?>">
            Para você
        </a>
        <a class="menu-mobile-item" href="<?php the_field('create_account_url'); ?>">
            Cria conta
        </a>
        <a class="menu-mobile-item teste" href="<?php the_field('schedule_url'); ?>">
            Agendar consulta
        </a>
    </div>
    <!-- menu mobile -->
</section>