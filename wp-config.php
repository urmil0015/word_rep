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
define( 'DB_NAME', 'Adparlor' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'A<C)2f=BAp:UZ0wWpi-Hx#GYVPJ$!:&!Is`bAc|B3eR~ynkZt5>[%(@fOIm&*r__' );
define( 'SECURE_AUTH_KEY',  ' RE2f%nv3.PyXMftylU>,9++UtveC8WfBRE4PTfsAYcwPnLzz8KBL.-#oo9C,Wr}' );
define( 'LOGGED_IN_KEY',    'qFjS(Dz2w>WMm9/t@2P{~mbNOLts+g=y76.wRFq6[o`JDKC/Q>^!jL#vs5mnK{U@' );
define( 'NONCE_KEY',        'g~x)%~9@|s*_v#M%Nl^T}1D@,KmaHn_;aUIiu82X6]^C[#@1rRW O-qk#TFhI`9>' );
define( 'AUTH_SALT',        '_22DuAIRm9XZL!j&tKM)p^+W/kNO{0~y|fwgv@7l0{-tZk;W,Tsn+17/QxCMuaP<' );
define( 'SECURE_AUTH_SALT', '$@Vl^6c8VBuqC5IF#vU:Wb|kKMquu]Wjz7?qnLI.353lf/I =aQ<l{?A+zcLq:aO' );
define( 'LOGGED_IN_SALT',   '(N+Mr? |Ep@eXy@#(bgiH~2,w3T$_|(#]h!:q0QsQ}:QAaY=|?&iZ4jTX5<q$AvT' );
define( 'NONCE_SALT',       't|3 4V>W@)1::]e^A&]55`i<!$H9_5Am{=xWR)y c{ag;k{0F3f6Oxm]i`UnOGUr' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
