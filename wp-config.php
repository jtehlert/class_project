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
define('DB_NAME', '791438_anoobdevsblog');

/** MySQL database username */
define('DB_USER', '791438_andb');

/** MySQL database password */
define('DB_PASSWORD', '4Xv65zn6');

/** MySQL hostname */
define('DB_HOST', 'mysql51-018.wc1.ord1.stabletransit.com');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** Allow automatic DB repair. */
//define('WP_ALLOW_REPAIR', true);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '.h,aXU|!V*3&e~z&>b2HNH%hV1mS!kw|shqyi4/yO4&S2+{sNylPcX?%yV0(^,H<');
define('SECURE_AUTH_KEY',  '&Di-p/%;?+wyi7n`jQt}u+GtNCVOm!~(r^j))zs y^ruJ#1[g-+{|9S|SjY-pev9');
define('LOGGED_IN_KEY',    '|jiv9y7l*fnqkw>J6SS@Hj3^o a[#=m|#Zh+qm{h.>1$4L8xG^OS<a-!,[q|`+ -');
define('NONCE_KEY',        '{ie-Fv+a3PgZ[C|EUSoN,x@<_j-}kr[yonHy[&+:2M|83u%2(_[Wx ;:[Q;ucrPU');
define('AUTH_SALT',        'sP.6[,@2?:-y$.{%s07:]b*(X(uw&m_P0PR[iQv+@y)J(S^xr4{w`m0Ud}Tm^hn0');
define('SECURE_AUTH_SALT', '=rDXvx9]::3H.?RB8*z[>v%3ysmj)X(T}$xk?OD+uXoI]zpjNfEovXM}HSvP6m;D');
define('LOGGED_IN_SALT',   'Nj1%p&?UG-9wm(W&Qwj3}G>/;&,eE151&DLIu#Py5 u#` u@A+Y*OM]~>-,>iT%Y');
define('NONCE_SALT',       's:=_zHXW-@Ay(jX>Itb)0Rvhd_evnr-]S;nW2ZDM?(@bYyarAosVMcj;O%K]ehrN');

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
