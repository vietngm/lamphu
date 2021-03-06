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
define('DB_NAME', 'lamphu');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost:8889');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define( 'AUTOSAVE_INTERVAL',    3600 );     // autosave 1x per hour
define( 'WP_POST_REVISIONS',    false );    // no revisions
define( 'DISABLE_WP_CRON',      true );
define( 'EMPTY_TRASH_DAYS',     7 );        // one week

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '$JO%9nRoCoIr*;>iWLPi0a}KIA@)zQK|7/c^]UOfG6#NWCb2^=%Vb1N7NEWTMzgt');
define('SECURE_AUTH_KEY',  'm(BQrH4g:2l*a43rwm>mpH`HV8skZqOGc|+Y#~JHlRt-?`>JPE}^/&XlW|IoJ=8H');
define('LOGGED_IN_KEY',    '5zl#ppc#PPz|xXtRJ4uA6BM;4X|Gt}:eEtfb>b(4b5/nif[3j.bSonm3xdq]Jxf6');
define('NONCE_KEY',        'X+)f;{%V<j5]Tu>?W/#,;@1d]Pb@ExCr`OVUOff#A0sjc>&VVPJ4atXTUZtQYW9*');
define('AUTH_SALT',        'l`i7U]2(S)fAB!A4K/T+-JD+VLLmRz3AT|Vc Or4eV`Fo:~LUmsp|{x5K3[$KX>-');
define('SECURE_AUTH_SALT', 'j7-q/.t&^rL`2|gXVmhIJ}XmX};RzzFq5uqs}]&j8tEWZK(G:K]46O>m+;@Pb]bk');
define('LOGGED_IN_SALT',   'k&%mus[U=&gK%dV_VW2ZpDr%1~T,Y&4`sI;8G;TuN}dHz-+l?UD_I<D*-zVv(7mK');
define('NONCE_SALT',       'u{S*lD--)!cjTv*Z&?](zVXST3g+hiHB-Z%+Gf|>OgAX+@E(Yd%].9.kvUusZ<j ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_MEMORY_LIMIT', '96M');
define('WP_ALLOW_REPAIR', true);
define('ENABLE_CACHE', true);
define('WP_POST_REVISIONS', false );
define ('WP_CONTENT_FOLDERNAME', 'resource');
define ('WP_CONTENT_DIR', ABSPATH.WP_CONTENT_FOLDERNAME) ;
define('WP_SITEURL', 'http://'.$_SERVER['HTTP_HOST'].'/');
define('WP_CONTENT_URL',WP_SITEURL.WP_CONTENT_FOLDERNAME);
define('WP_ADMIN_DIR', 'admin');
define( 'ADMIN_COOKIE_PATH', SITECOOKIEPATH . WP_ADMIN_DIR);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
?>