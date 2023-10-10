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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script src='<?php themePath("/assets/js/main.js"); ?>'></script>
    <link rel="icon" href="<?php themePath('/favicon.ico'); ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?php themePath('/favicon.ico'); ?>" type="image/x-icon">
</head>

</html>

<body title="for_you_company">
    <?php get_header(); ?>
    <?php require_once('components/menu.php'); ?>
    <script src='<?php themePath('/assets/js/vue3.min.js'); ?>'></script>
    <script src='<?php themePath('/assets/js/navbar-menu.js'); ?>'></script>
    <?php require_once('components/footer.php'); ?>
</body>
<?php get_footer(); ?>

</html>