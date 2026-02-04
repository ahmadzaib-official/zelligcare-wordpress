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
define( 'DB_NAME', 'zelligcaretheme' );

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
define( 'AUTH_KEY',         ':ye6JY11e-!X]d?t1vSdh_/=hLfp#Cqjt3xYz~_v?$kL:j8}fk~.~<l-.37[x>Gm' );
define( 'SECURE_AUTH_KEY',  '[NX-t7q&knyI[splm8U)AYR,a!P_v5VCC,3AXWSpmUg}yQ)rdgZ<Q7Yu8,vQs?((' );
define( 'LOGGED_IN_KEY',    '#A0oP[ N(=)h3p)cUVjEVpB`{Hr*GtD%i2*Xm5(@8lk*e!u1w%<Sj)4d3:A EX`p' );
define( 'NONCE_KEY',        '-lXcG,&bQ1O%O $jHu~plHGQ^.YJm:afPd-d-ooI7wuM+dvn~eAO, |/}3A9@Z{J' );
define( 'AUTH_SALT',        'b<]IT-=f+X%?B=<_UZA{=c*1?-cF3xNUu]jixYPV4iX#D-QuRUQ@Cr2uOV4[Kc,e' );
define( 'SECURE_AUTH_SALT', 'm`PfSrPa{M<q[#7j$L3ahs3f#!KIfbnNR6h6]:mlE^ cGIRpo4b{{Be)!&`w${i|' );
define( 'LOGGED_IN_SALT',   'CfLaobeLm]UZ5Ok$|ydD!}gJnvA;MrWdDCf).`[03Ipn_m![d0q=%fMQZN9a6Zca' );
define( 'NONCE_SALT',       'gf,QFEmrv5|d]kEzE428db14)e]@~1~u6_BTt>^YS~d}/bUOkV0Lq=~[B0aKxn,;' );

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
