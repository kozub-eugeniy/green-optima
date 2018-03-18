<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'imsconte_onrial');

/** MySQL database username */
define('DB_USER', 'imsconte_onrial');

/** MySQL database password */
define('DB_PASSWORD', 'imsconte');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'HLx[{M-@sU=sE.5*?IjOj06)%x]y87fulbp.|^p>H|y)CzI0h43z_.<0u]mH#UTc');
define('SECURE_AUTH_KEY',  '#>QFgKq;u3u{G.%R29|~O?W;|&/uSGu4AW-]v&TANXPv euw8)jY2@|.)Hh.ePj~');
define('LOGGED_IN_KEY',    ']X{bG7%!eJWlF^.Cr9GkonIQ!:N@)I]rqrH$]}a~m7*1NJE>s[WVd{z%mV5L=t;*');
define('NONCE_KEY',        'Uof?*13wi (WC%@/wx9[4j+;y&YlE7vp2.b$VDk9St{C1rY-DhjI#gXmjmMMp4j0');
define('AUTH_SALT',        '$&eJy1m7v{+b  Zd%>maX`3{BhCP90R8tztK}mZQkh?aKnkN]~kZ(j*TSUh@kd+3');
define('SECURE_AUTH_SALT', '=:6$^+=~2CZhANW(T;&NKWV);K:OmNxnVA:)i|0H2|hG]Jk?mgR82^(U~sEThL_H');
define('LOGGED_IN_SALT',   'APMP%lLyGoNFER|i5^S6dPQM]b-RDS&.v[K%rN+*9P&~e*UG,fiC<r|)hPTBzVA6');
define('NONCE_SALT',       't4(nUvL lkJZSKq|_9,@hZq5iVOAIFJb11p`W> ;U}>0rX-H`[M|l014CN60Lchh');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);
define('FS_METHOD', 'direct');
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
