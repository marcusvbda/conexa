<?php
define( 'WP_CACHE', true );

/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do banco de dados
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do banco de dados - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', "wordpress_db");

/** Usuário do banco de dados MySQL */
define('DB_USER', "root");

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', "");

/** Nome do host do MySQL */
define('DB_HOST', "db");

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '>;o*i#*;Yq?-=^I;kC{biyI=vI2]C!N<N`jl6Ri[s13Z3GA3*&uk2[B,U?xJXJWD');
define('SECURE_AUTH_KEY',  ']LMCYG+Wk|u*qu-*u6obn;jsxThCl-Hw+o5L!?CoB6IQHwiThunNDc_c5w[;$/YE');
define('LOGGED_IN_KEY',    'wsmr&f:{Jpi%@,tdXZ|6YDLqA;t/T<7`a3;2dOlqZV8RonQ)nm5+U.~C&OjSt^P`');
define('NONCE_KEY',        ':NgQAunWv9X&CI.|4gpN@3bou%ug5T)=&<lX62p?,v}v.fLYt3C4!L}AptP*|J97');
define('AUTH_SALT',        ',u74dEu2CPp|T[{h9M+9C^J]nGu9{^mGA!JCum_liFgvG&xVvAo^SMXJilUzy;7&');
define('SECURE_AUTH_SALT', 'xjk1{Wod^yWHvB->?5q:vs]IKNR-Sx3V*A%)sJnXa[n.Z,pdeqwrb2Yz=UH[&6nu');
define('LOGGED_IN_SALT',   '4#RMo$9C(Rn!S/b`!4g&(+|{zTS&&&`]s-A$RN`-Pk<LTdT8b9vG%(8m_%;;m&V?');
define('NONCE_SALT',       '(NPjzUM.c/T-VTRtxfqoj>^Tu.POz;zG0^}x;Xyt<<DF(J;rEK.@/mAWrq<vCay3');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* Adicione valores personalizados entre esta linha até "Isto é tudo". */



/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if (!defined('ABSPATH')) {
	define('ABSPATH', dirname(__FILE__) . '/');
}

/** Configura as variáveis e arquivos do WordPress. */
define( 'WP_SITEURL', 'http://localhost:8080/' );
require_once ABSPATH . 'wp-settings.php';
