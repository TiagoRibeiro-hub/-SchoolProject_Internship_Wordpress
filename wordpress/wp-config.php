<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'epochmedia_db' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'RFG)wEF4tQ!eN/3e' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         'pto!fX(n!aEs{?|4/(v|lSmg?O&,$i/rdK|pYb|As}8]fr?O8RsN+L9ZG`VJJ1>1' );
define( 'SECURE_AUTH_KEY',  'wU*},HwARi*rB%z+=2Ot}^D$~?Q,M|iSH^zj6(nn?qrpBm3I,B|&mH-R.iHUAK{i' );
define( 'LOGGED_IN_KEY',    '4jK&|O3Qb,RaZ5Agdwh+X8lnY-;(d|lu@L3@$A2@@9}eOhV7z=xN)>pRsqT4Jf7I' );
define( 'NONCE_KEY',        '|9{#S|N;Hk]P~2i>KqGyuP~[w~B@/p+Y}/*.%V=TXj(Nq*RJLB<I>^jf&7>UM3A+' );
define( 'AUTH_SALT',        ':Od&f#{%0Z%&Nu,1ad%[dnTXV{Ln{}^5b7;0$YNDR:LZ$G2Z _t{QOg+-I~&_%+y' );
define( 'SECURE_AUTH_SALT', ';c@ZI]0y[VML)@dT|?iy/G5Dt#`)$z$y(ey^J<i}P,aqlh(&7NwL#|0 ~Rf&g>q9' );
define( 'LOGGED_IN_SALT',   '/Az?%XJ)5j?z{;^NBx]h=?qJQB Jf6juyNQ{H!*N(e!*JSqAv&KZ8<#19>9.kdZ|' );
define( 'NONCE_SALT',       '3aygPH!eQ O5--bhq#$EDIk[Q$<_]<uc{[/TA)Jl&+y]6V>[*+8moiPo1Yo!I]32' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* path wp_content\debug.log */
define( 'WP_DEBUG_LOG', true );

define( 'WP_DEBUG_DISPLAY', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

define( 'WP_MEMORY_LIMIT', '256M' );

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
