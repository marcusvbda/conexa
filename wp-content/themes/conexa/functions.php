<?php

function themePath($path)
{
    echo get_template_directory_uri() . $path;
}

function formatStrong($text)
{
    echo preg_replace('/\*(.*?)\*/', '<b>$1</b>', $text);
}

function loopToArray($field, $subField)
{
    $items = [];
    if (have_rows($field)) {
        while (have_rows($field)) {
            the_row();
            $items[] = get_sub_field($subField);
        }
    }
    return $items;
}

function loopToString($field, $subField, $separator = ",")
{
    echo implode($separator, loopToArray($field, $subField));
}

function customize_acf_wysiwyg_toolbar($toolbars)
{
    $toolbars['Very Simple'] = array();
    $toolbars['Very Simple'][1] = array('bold', 'italic', 'underline', 'removeformat', 'wp_adv');
    return $toolbars;
}
add_filter('acf/fields/wysiwyg/toolbars', 'customize_acf_wysiwyg_toolbar');


function api_purchase($data)
{
    return "return here";
}

function register_api_purchase()
{
    register_rest_route('api', '/purchase', array(
        'methods' => 'GET',
        'callback' => 'api_purchase',
    ));
}

add_action('rest_api_init', 'register_api_purchase');
