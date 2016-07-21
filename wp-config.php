<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'db632555477');

/** MySQL database username */
define('DB_USER', 'dbo632555477');

/** MySQL database password */
define('DB_PASSWORD', 'im@rk123#@');

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
define('AUTH_KEY',         'T/m$X9i^bj0ar+Pg`pR9l43ROTXfV|utQLGROzE~UM&>R58n-aJqNjf o(yvqN}p');
define('SECURE_AUTH_KEY',  'W{4;+B(lG!*Q/Dq#I*4xxd*`g(C`ES<^RarNTH`C|?vL)JA6.%f*NH*X+eNIN`!g');
define('LOGGED_IN_KEY',    'aILk3?vs*Q:6/otty{Zq]eKgI3#?(%2x4#Un5g:(F]un`Ep1r]*Y$)DS~^3J**dj');
define('NONCE_KEY',        'YIyzV;Gyrp/x-Lpv~{b`U@]mWl/;[!x@@x1[0_z6Bs#~t/:dDGiiPyz&++(-;^8*');
define('AUTH_SALT',        '813m?9$RH}%cMgIjzaPY=vV!r?d35#@ZxPU.s,+-2iNL<;[n2<G$43Z?A3#Q!%7.');
define('SECURE_AUTH_SALT', 'lKZr9Hn,WCST(Z:[G-f6l%N|~$ Zns 3Vx<O@O((&2,,Zh4s56#Vq*_4zNb Dpw9');
define('LOGGED_IN_SALT',   'TFx.&79BX)IvE=N<R+!kTZ>]Si,l/[LfgWg7@.R#y:fK&ceMn6%QJefr6hP<Z;A5');
define('NONCE_SALT',       '8L1qecOPmO|;?$wt[+c6]Z`@&^DQa{Fl0N:H&rOc100W`/:1+M?0:Dx;c-g?V&+]');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'im_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
