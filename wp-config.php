<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'hola' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '1234' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'E=.9.o9#:/D4HKujCr|#+UPIr>M; sJq/~i`yqDg#a(w1o>f=}hq`sH#,zzEB[eb' );
define( 'SECURE_AUTH_KEY',  'YHE*;5vZKh{2j,~1wwSN>zs>nU5 @cMwc_.DYjZc9F[jj~|; p1|-G3;I&W; 1JL' );
define( 'LOGGED_IN_KEY',    'NIDAi{r~T2k 9n|Fb9CE8k:zYvPeR3+3j;?-0q!-jivHM=9b)5%cP/T0Thh6fU]4' );
define( 'NONCE_KEY',        'e^M%zS@n|S^T5G8r|`yulNUGi!?v7|,C5&_%OZV{;;l+5W4^$k?hh{Sy!]Kb`,W(' );
define( 'AUTH_SALT',        'zor]ZJsJnyZSWwNYOuUGZ_!g_cb9Ax7JEV$db!=b>Qpt|i}s*+&v<O)|w>MYK*-m' );
define( 'SECURE_AUTH_SALT', '`TbyP[?dk<AT6}9GJEquEh#x>YBH {2fTNDYIa22bSDl}!y,p#2U.N9w0DC1V:.d' );
define( 'LOGGED_IN_SALT',   '.B_!sdh.`*(l`p)W~zM8{$]C6ll2/8P6en*x|?-nRdd~P/jE0kELFNn&x#@HWnEy' );
define( 'NONCE_SALT',       'vA0_(iXfFnE`0x)o)o$PysVp[t=PgzDb~~N $ivQhC{ /s8)>p9#Ac.Gg9*NC7a`' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
