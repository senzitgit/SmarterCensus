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
define('DB_NAME', 'senzix15_scensus');

/** MySQL database username */
define('DB_USER', 'senzix15_admin');

/** MySQL database password */
define('DB_PASSWORD', 'senzit123$%^');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'gp0y8Fsil`GJ7|!,*?4m1~aseeCo02W^BY0W,^&n[qw#K`9%vBHRD7AB-Qq+4C|w');
define('SECURE_AUTH_KEY',  'JKwW-]8)uNk%$V`%x-`m*s_;3Aj}:LP]};=J))%C>>rv@B@{e+C4H^t|>JS|s#|M');
define('LOGGED_IN_KEY',    '>|n-6Ft?-,bJRWk]:Z-$$Kk).p$u8@(^Pz2mD1BMXW`*PBw^6!X740RzF~`K>L,.');
define('NONCE_KEY',        '|!en)P+^B@+d(-qXeD,j3czEm^a+TK{tap,OO=da#]s}/[-`1*%}^qwZ|jx^`VY$');
define('AUTH_SALT',        '<6_i{yk%l+yW#U9ZyP$NnL&Oo.8N=fY!s|+CBJ<P]P_gQc6a[%}>QB*@;ruG@bQe');
define('SECURE_AUTH_SALT', 'szc.NN~ZVZm 72s`8:e+.N)}.ue++&^?Vo--!-(p;75SI+}t)C@>JvM[#QF xpNc');
define('LOGGED_IN_SALT',   ' GHQt}N$o~Di4W#):8%8l3@f6M {79LS<g.%?:T2sBewS@>rR/PRZ{o.jG&ytl9+');
define('NONCE_SALT',       'Tx5Ng+ mRc`u>F(nrnt+8H]im2QU5oxfFa2ed*>e)+}TYOu3Y/_l?2(Rh&X:N|=;');

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
