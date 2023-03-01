<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

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
define( 'DB_NAME', 'test' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost:3308' );

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
define( 'AUTH_KEY',         '8ScUmlv9CB99_HclVrHzK5:,kzJ4.D)`mX<,K!L,<`V+]LMrd0JEiJl.!(*_x~gx' );
define( 'SECURE_AUTH_KEY',  'cBb!qP!LeKkg)bE@7eOaH1PWy#Pl5/.cF%h%hSgSR_Nv?pt@*NlZw,+W8N q!24n' );
define( 'LOGGED_IN_KEY',    'cx,B3@D1|%D3 _L..x3zz~Ei*eP`x|+7^yST%nU(=9Cz=aM_7Qwk#Y[Wk-?uy,2J' );
define( 'NONCE_KEY',        '2 ,!``|a,nwV0r=Nf&wP*j+U )D/>s>9$;j&GIm``8ua_8bD[f1.[uUG+W{6ANB?' );
define( 'AUTH_SALT',        'MKY>cP45D;_IU(U*bSX[u~Oo6Hrl(nD?V86nBHNp4Tk00Z&J{EAgc{=[p6?,8VP~' );
define( 'SECURE_AUTH_SALT', '8KuM5*o6KChd#^Bq}c-[ZiR+D>bc:5O( 0@Z:88nL?w~U.^$u#nGUOoavSJ6SSjl' );
define( 'LOGGED_IN_SALT',   'uOXHLRQA!_/eog;Fl#CQ**|]a0yIO0=Kk_HWjwMb]*9zXC}^,H>R1CJE=C&yRt9c' );
define( 'NONCE_SALT',       'y 30Q4ID%O1z7feZS<n+gM!Y4pCNSsbo:3(3l!Cu~<jTjk:5[y/kB%GW+=rY_Fg$' );

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
