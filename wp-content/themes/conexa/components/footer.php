<section class="footer">
    <div class="col">
        <img src="<?php themePath('/assets/images/conexa-white.png'); ?>" class="logo" />
        <a href="<?php the_field('for_you_company_url'); ?>">Para a sua empresa</a>
        <a href="<?php the_field('for_your_operator_url'); ?>">Para a sua operadora</a>
        <a href="<?php the_field('for_you'); ?>">Para a você</a>
        <a href="<?php the_field('for_you_company_url'); ?>">Calcule a saúde da sua empresa</a>
    </div>
    <div class="col">
        <a href="<?php the_field('press'); ?>" class="mt-auto">Imprensa</a>
        <a href="<?php the_field('career'); ?>">Carreiras</a>
        <a href="<?php the_field('questions'); ?>">Perguntas frequentes</a>
        <div class="social-row">
            <a href="<?php the_field('linkedin'); ?>">
                <img src="<?php themePath('/assets/images/linkedin.svg'); ?>" />
            </a>
            <a href="<?php the_field('instagram'); ?>">
                <img src="<?php themePath('/assets/images/instagram.svg'); ?>" />
            </a>
            <a href="<?php the_field('facebook'); ?>">
                <img src="<?php themePath('/assets/images/facebook.svg'); ?>" />
            </a>
        </div>
    </div>
    <div class="col center">
        <span><?php the_field('responsible'); ?></span>
    </div>
</section>