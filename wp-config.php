<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'icea-blog' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'gVzl}ze^!x=8Z`c.!E?;!9n9mkXOmJ%-6i=uEbbe+*b#8jl4O:RZrsj f_Zpb,/T' );
define( 'SECURE_AUTH_KEY',  'j:AahCx4:-oP$Qw-dA8(%7l9Pw6bq{#TP-n;>NZJsgb)PANGz8].rBU.BYK:p6`.' );
define( 'LOGGED_IN_KEY',    'zNfGco:r~4xJ~8=hJ5(PknIw72vBrx=p,k=C%?y#)/|{S^Pe Y9h3#<B;9_.aHNO' );
define( 'NONCE_KEY',        'zy-F{lEUy}40XZ=~^s!DYdEua_}xm`uI}%rF#%[4Jw $&[P{la(IS/d[DBRy>7`Q' );
define( 'AUTH_SALT',        '(wq^B-$9Pl_i`aNl^#mT7*uD[wh>u!A_Y@tKq$seU C8rxMc0woxvq]@*Rnvz42C' );
define( 'SECURE_AUTH_SALT', 'IxAL,AXK: (<zb{.e]JLQm$cs$~_40J4Z9RCs7/!kw3Z))^L4T2;GHM>F$>S}Etp' );
define( 'LOGGED_IN_SALT',   '`Z +QD$+n_i_V$9M{$MG~@!Qx#{B`L%c E$gSO+RZ/?5xj^gOAT4-|roJh=h9!6#' );
define( 'NONCE_SALT',       'mGxGf:N|vx+8AqP)In%1hRdv+chtTyuWF!,4;%`2%mb$@enA_Z32.$Xa7P.*_*VA' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'icea_blog_';

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
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
