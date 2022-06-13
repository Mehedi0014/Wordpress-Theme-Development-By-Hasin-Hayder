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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wtd' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '>1%7QWz@=w>:*4/FBHpD]L16yEia+vwP}*6JM~LYCOc8tt)_Rd_Hou#N0%c|}Y.L' );
define( 'SECURE_AUTH_KEY',  '[#9yc(a7ReI ](9xP0hAXNm|Tc{.[U!Y?>?M004OAoT1pswdjAH8iPoA~Vd7m,@7' );
define( 'LOGGED_IN_KEY',    '52H]7uH(K($OpX0;thyh*{Yry0a/pLkRCNN~C8b>K_@0/-0VY?leJAX!,+`1%Y9l' );
define( 'NONCE_KEY',        'z/l_g&EUh4]-^/t5kIWIE,33= G<+ht16g:S:+ofr2/PD3[X2[ejzQK4i;hT5Z6m' );
define( 'AUTH_SALT',        'jO^ELy]BpA+Lrb!IM!fmzXNG@H)OsGcokG[2Q;ite3?f-XtP)Tqs00o` p.~VbJ)' );
define( 'SECURE_AUTH_SALT', 'eGcksgimBq}p27E4H~Uug4nlr1#NYrWo(Q^t08pE4W*tvgMybeIisH[|u_/Fp(b3' );
define( 'LOGGED_IN_SALT',   'Xs)=mxdU;U^`q$lT!N)<7W0AyOi]]Dc2V_H/D[]l,i^6H.O[+cbO0,=yvV2I-iX]' );
define( 'NONCE_SALT',       '|,q!~xDpv{Tu7X6G20>aD(._zp~wt;5e%.sv_gZRqHOG2xU8+ki7/Gk|9]dL6%B-' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wwtpd_';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
