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
define( 'DB_NAME', 'plutus_site_db' );

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
define( 'AUTH_KEY',         'q.LwUsrl&sCUxcvl1bTHE][M6dKuHI[S8E7co:mmM{SfJg7zU!$u2GU-kpQ-ySoh' );
define( 'SECURE_AUTH_KEY',  'jdI}E2[;%D`Fb^zcr]BP~^fK1/|viuo]T&A~)hQy,C$gNkP 5j^;^8U(D5z<c/;<' );
define( 'LOGGED_IN_KEY',    'B}3yU^B(?nVEv0;|)[E+?Jm&*?ySMU!RY2`1d[:ZsF{]]-v_V3Yb`($*AzgPyx+Y' );
define( 'NONCE_KEY',        'B,J{hKRx2.AI5g%HX[q_o^)3Jk|^Vt3iZMiABS4wvWH /QAKEy^>K%.K5v%G#b!n' );
define( 'AUTH_SALT',        'reW.H=2KTL8k=|d=.>lxpKxQtz+wO)NP!cR5{x.ss)2>W87& m.FhI{w7l[ZEN>e' );
define( 'SECURE_AUTH_SALT', '%x!HA^):h!3l=]Iw^H*pdW~)l;a)&cT}c1mW$Aj${(_fJLmIl0hO$O(w#<t[@vMc' );
define( 'LOGGED_IN_SALT',   'aC1HXjo=|vn>$h*&K?VXA$3Y;9`G9OWz=4+SRo!^YpAJJWv%KD|&nFd*5,BK{iRi' );
define( 'NONCE_SALT',       '>ik9bnGSr75L3I*o3L%c1Q@0yU<NgvV(6lyXUxYzw!+lZ7>tE8wQ6aZWWDY,FRFM' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
