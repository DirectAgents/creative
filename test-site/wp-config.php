<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'test_site');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'I/<-&kkp#%n]yL8)H6_10Bu3 . -%c(]7pKJXun#TDfqmq[XO8oD/8x1{l|T&$^+');
define('SECURE_AUTH_KEY',  '!V~&<Um}&wp5m58tssb<5-LMeSbByxMjEjXhs?w<{(f@m5pka|#k*$c>>nQa&QdP');
define('LOGGED_IN_KEY',    '(S/gx,t2CfV1Qv~[!/0,9yQ3(bAq>}?SFgMFVB%R[kOS40.A|zq`@cK^H+*~C+]U');
define('NONCE_KEY',        'lAyYy.3PPC)8NjQv=?#b<IfbqKmF$*jef1N+ 2Krb<9YR_o9B5!H]: 5!}EdeX7!');
define('AUTH_SALT',        ' 51:c+U+mq]H,K-.?:u%oP&fB#~0PaTmxS;E@ri5G$f1U?vJ7e+U8yG:B(0LUT?b');
define('SECURE_AUTH_SALT', '|%I`swDP-gx2^+id<2VH+6b`-a_.b7|nq|P>lyk@GA=+2n[6b_0FS(2PAK|O9]|}');
define('LOGGED_IN_SALT',   '`zd-.#-FO7lw%k $Q5Ly2(])XM7O4tgp9FusO8g/pNZ%08%+P#qc;IyLeS{4Et&A');
define('NONCE_SALT',       'z@IUm!a+-D{_mer2L6LA7c<SyQ;GhHJkQ.o,K1|QMz#6Sask|~G3uR.ZAp77wieN');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'test_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
