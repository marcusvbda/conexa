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

function register_api_subscription()
{
    register_rest_route('api', '/subscription', array(
        'methods' => 'POST',
        'callback' => 'api_subscription',
    ));
}

add_action('rest_api_init', 'register_api_subscription');

function get_pagarme_auth()
{
    $user = 'acc_7pOZmntXkFwWjkyM';
    $key = 'pk_V2BZ9pASOyFglA84';
    $auth = "$user:$key";
    return "Basic " . base64_encode($auth);
}

function get_pagarme_route($path)
{
    return "https://api.pagar.me/core/v5/$path";
}

function send_pagarme_request($method, $path, $body)
{
    $request_args = [
        'method' => $method,
        'headers' => [
            'Authorization' => get_pagarme_auth(),
            'Content-Type' => 'application/json'
        ],
        'body' => $body
    ];

    $response = wp_safe_remote_request(get_pagarme_route($path), $request_args);

    if (is_wp_error($response)) {
        return (object)[
            'error' => $response->get_error_message(),
            'code' => $response->get_error_code()
        ];
    }

    $response_body = wp_remote_retrieve_body($response);
    $response_data = json_decode($response_body);

    return $response_data;
}

function api_subscription($request)
{
    $body = $request->get_body();
    $response = send_pagarme_request("POST", 'subscriptions', $body);
    return $response;
}
