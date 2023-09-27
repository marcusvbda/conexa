<?php
define('THEME_PATH', get_template_directory_uri());
define('RECAPTCHA_SCORE', 0.5);
define('RECAPTCHA_SITE_KEY', '6Le0q1ooAAAAAHy7WJ7rBjfvaE1-AL6-fKjpeKbu');
define('RECAPTCHA_SECRET_TOKEN', '6Le0q1ooAAAAAIb7nPV7eOR0kpT1wLyqmAQuQp1t');
define('PAGARME_SECRET_KEY', 'sk_V2BZ9pASOyFglA84');

function themePath($path)
{
    echo THEME_PATH . $path;
}

function recaptchSiteKey()
{
    echo RECAPTCHA_SITE_KEY;
}


function formatStrong($text)
{
    return preg_replace('/\*(.*?)\*/', '<b>$1</b>', $text);
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
    return implode($separator, loopToArray($field, $subField));
}

function customize_acf_wysiwyg_toolbar($toolbars)
{
    $toolbars['Very Simple'] = [
        [
            'bold',
            'italic',
            'underline',
            'removeformat',
            'wp_adv',
        ],
    ];
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
    $secret_key = PAGARME_SECRET_KEY;
    return "Basic " . base64_encode("$secret_key:");
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
            'Content-Type' => 'application/json',
        ],
        'body' => $body,
    ];

    $response = wp_safe_remote_request(get_pagarme_route($path), $request_args);

    if (is_wp_error($response)) {
        return (object) [
            'error' => $response->get_error_message(),
            'code' => $response->get_error_code(),
        ];
    }

    $response_body = wp_remote_retrieve_body($response);
    $response_data = json_decode($response_body);

    return $response_data;
}

function validate_recaptcha($token)
{
    $recaptcha_secret = RECAPTCHA_SECRET_TOKEN;
    $recaptcha_token = $token;

    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptcha_data = [
        'secret' => $recaptcha_secret,
        'response' => $recaptcha_token,
    ];

    $options = [
        'http' => [
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($recaptcha_data),
        ],
    ];

    $context = stream_context_create($options);
    $recaptcha_result = file_get_contents($recaptcha_url, false, $context);
    $recaptcha_result = json_decode($recaptcha_result);

    return $recaptcha_result?->score >= RECAPTCHA_SCORE;
}

function api_subscription($request)
{
    $body = $request->get_body();
    if (!validate_recaptcha(json_decode($body)->recaptcha_token)) {
        throw new Exception("Recaptcha inválido");
    }
    $response = send_pagarme_request("POST", 'subscriptions', $body);
    return $response;
}
