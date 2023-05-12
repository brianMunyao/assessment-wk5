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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'assessment_wk6' );

/** Database username */
define( 'DB_USER', 'admin' );

/** Database password */
define( 'DB_PASSWORD', 'admin' );

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
define( 'AUTH_KEY',         '[|^jy4s/?])$B6ifJ0:<y_&mCY42Bm!Noy~<5BA J,h<n/n/!3>d8An&NZY)ZQ`Q' );
define( 'SECURE_AUTH_KEY',  '6rwV<,ngP2xV_jhA|[}N./Y}b{zyL11QG--TL0=2EIx{61Y%(^(uTrB/=ojof {I' );
define( 'LOGGED_IN_KEY',    ' Ri2Iv;//bF<H<7pc|KY +([sI9J}lTrHcFCtSGRcxqUNu~9ud`%(0mz>im1FRx:' );
define( 'NONCE_KEY',        'N,yW98G|S7GH5eHu*>PA?JdDBYbI7Ruyn/sv~</VUY#vE{}|A=Jsxx&/%6u}xvYr' );
define( 'AUTH_SALT',        'gFXd]!|xE%a}m4TB}t|_y3xE>VY~^er#C2y.~Kgy26?&R?= SC0{va#l:!CmzK-j' );
define( 'SECURE_AUTH_SALT', 'L0uUFqcw8F]WOOcD/@$YH<;ehTag(RN4p39UHQensqg)+ 60>UB^Z${1h=VNK%3s' );
define( 'LOGGED_IN_SALT',   '}f6A._>~,DGetgdL+@oUx>^%D+[FhE(_}FxE?(Hi^$W_)bQ._p/(Y{yR<foO F9P' );
define( 'NONCE_SALT',       '5cr.E:(v$>ust5r3^}-/yaRdL$pgV VccS0a0lHs-,w(.0S9dJr}wT*R`2E5@{Xl' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
