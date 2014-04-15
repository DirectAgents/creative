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
//define('WP_CACHE', true); //Added by WP-Cache Manager
//define( 'WPCACHEHOME', '/Applications/MAMP/htdocs/creative/pos/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager
define('DB_NAME', 'wpnewsite');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 't^#$&-+Hgk*!db');

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
define('AUTH_KEY',         'ML{C9[pQCBs,-W~<A-rkcl{Qwx7M3CvC!9{9A]`>5Tb`&l9U#ZCJ8C>Ca!i=l2C;');
define('SECURE_AUTH_KEY',  '~Sx*c#LA2mN{Bn}X+:rrf%#_-{.~zlsldfS_ASwlqe5$:VoX&9Tb<tJTse|E|HTH');
define('LOGGED_IN_KEY',    'BulY8`_p5}=V}Hg+^GF4<X%H<1GkTQ:9U_PW2XsH7e=+cT&TGx+D7q`Z26#fX2FI');
define('NONCE_KEY',        ']@g>7m1/]zn,Ps5RaZa[axLC=H|i0h+WmL)-cnaOf_Ph@x03j_/&7(?julx U_yE');
define('AUTH_SALT',        'e|C$5l[+9-T_$y)^:|R>8s?&}Z_g:m,Jt`$+QpaHH(]FPr-y~Gdg2]:d46y[&GwN');
define('SECURE_AUTH_SALT', 'WNJKgJkJdj1zus7l~j:KwL@D~;v?(h03,U]=|1C@|E<:zS7&X,33z*:e^+a-M;_a');
define('LOGGED_IN_SALT',   '.b!d_$uq2-*64nJ%.Q~T[EG= J88XfkgF4G9,!N8aYigz{)8+7T38VxJ-W=X!Q|W');
define('NONCE_SALT',       'EpG)VV~Wl:*Z,xL;I|zNhUn1:OC;up(i480j o0[`=Fn>OD93uc8_yX}u}2LW}A|');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'poswp_';

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
define('WP_DEBUG', false);
define("WP_HOME", "http://dev2.pos.com/wpnewsite");
define("WP_SITEURL", "http://dev2.pos.com/wpnewsite");

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
