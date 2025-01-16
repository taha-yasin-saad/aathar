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
define( 'DB_NAME', 'aathar' );

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
define( 'AUTH_KEY',         'a^HG|!PC~xe#R7)yvFHuVMr0ODnOHSL^Z4BCcBDb};8C..~dFLt(B+Lz;{Z6; Y/' );
define( 'SECURE_AUTH_KEY',  'w13;/tRPs<:q{yUu<p;qB?K-.IDRMxE%)Vna{O-Wqn&C2NgI#^G6u!|XNv2D&6iU' );
define( 'LOGGED_IN_KEY',    '6{d;*)JHN5Zq@apEJ]BMuKUKly8A]9LC__S,7_up+@_HT:B;u,Q$xyzH2gac>r`^' );
define( 'NONCE_KEY',        '1^bu,*) jC|9PlJ~2nlRGH|!iq{(Er>WgNHmrVc<p%Jj,a(9MF}>j[N!a1c)F9(}' );
define( 'AUTH_SALT',        '#F}Koo$P1s]`E2NT@hlDiG`905-Z[slKh]>s+G<% nf2d9n0~.2)Km@/0%wt_KSI' );
define( 'SECURE_AUTH_SALT', 'JjV-b+CoY*-2y=V-,%B4|(EH|/!Nr4p(HA6C]MXN( *wnUe2_sQ$:zBI|*%88;,1' );
define( 'LOGGED_IN_SALT',   '#R,,mwxEx4Nr%OH-_:A]M!^WHZwF+!he!p8&tXOBn`!|[y_*(~k?B`.Ug(L1!A{I' );
define( 'NONCE_SALT',       '#qP(e@t1zWiGRx~7EFP$JUp!UbDc.3<)-Bqrr:j7 1Ir0[r^^m)4E.VjiEeO+iBq' );

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
