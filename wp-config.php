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
define('DB_NAME', 'task');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         's2E}G+vQE}mlIR+|2k.~g[OW8aKd#1S%(ssxx&K&CK4;l9tqBNvOreF5*hFCz7D`');
define('SECURE_AUTH_KEY',  'vjeAYb25G|boXP~p_#bk5HN3 =$xdHx+n@)+Q^gyiyR<<1= !D9E|hoxS85yw_=3');
define('LOGGED_IN_KEY',    'AScFd?1`hIeciN>1P_SCw^<hUhqW}+OKV Gj3j7#[eMu2gG-eRl5qrL^_nD!$BoH');
define('NONCE_KEY',        'u,} CPG>x3Mr,D]{X@BBSI>[ua_JTAN}P6CTESY+Q3(e1, Fq9kzCx3I_7BBF^k1');
define('AUTH_SALT',        '#cA^dg%1WV/P$0?5.ua_)e^_yR<O|ET;y.lCpmcOa+T5k82F+%;~^C_9I#&LvW^L');
define('SECURE_AUTH_SALT', 'd|9:~%H{9(?pOHPov~Qd)NzV ,2 edr?2Elqo7kz.szuTvoF+T^mVqGOr8^`<&Kp');
define('LOGGED_IN_SALT',   'OnFNC*PXY#Q7<Qu=H^HEp0+agp?dep}cDfaj6S!zcP}u])>,wIl9/ut+hV3UvZZ/');
define('NONCE_SALT',       'HRu@suwe7xzO<RfpV|+B@DaYEe*ZP<aH,sHIHf3gCxZQsgKV})6ZO.lI%P3z+^~L');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
