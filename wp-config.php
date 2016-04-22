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
define('DB_NAME', 'TSLwp_');

/** MySQL database username */
define('DB_USER', 'TSL-User');

/** MySQL database password */
define('DB_PASSWORD', 'Ofkk17$9');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** INCREASE THE MEMORY SIZE FOR WOOCOMMERCE -TK */
define( 'WP_MEMORY_LIMIT', '64M' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'd7j/!eeUyGYs;v6w(7,6`YLZDbJB>h_3*ZVnewx8+T{NResb!6l rrq>-fo$*;:w');
define('SECURE_AUTH_KEY',  'DwIn^Z^*5S|A&ByE4|u`md-TS0_(p|~M=qV 3vm.h* ,]K>?AecC n)L33Dr=#NH');
define('LOGGED_IN_KEY',    'zANx-%Q3.Z9K~5^</of6-L6:{?odgnvm]+S`(u-<2Qj5nrpu.%+Bh>)1V(ZHq}+`');
define('NONCE_KEY',        '`}O|Ve9,.~BKn;{%u0]Y GHp)6^Hl1FuC1DCD!r*nzUS~T(Di5i~vbWZKJ7q0{N1');
define('AUTH_SALT',        ';C Kw03)|.WmnpDw>`?7PCU}A^8m.,0t FSHiN:v5|| St7@n@p un4Z[>Nqz0bo');
define('SECURE_AUTH_SALT', 'a03S+[-ndsh`T?mNC@&Tg.uq=B(%%|AM^J&1zVCus-Yp|Yl[C{{Bnx<LFf-2%m}E');
define('LOGGED_IN_SALT',   ',z&.;:S7bq0!3[|gW2/3x=O2PR`+%PHL&bv*;N~rrH($tNHp0to2n+Xl?A)LyFem');
define('NONCE_SALT',       '<~gtjdK`=LE3z|I>@Sh.vrgt5QUYsv:d=#BLDi5U`sfnl[-?DzZ+/8u`CDjy-Q-g');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
