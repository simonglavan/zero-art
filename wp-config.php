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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'zero_art' );

/** MySQL database username */
define( 'DB_USER', 'webevo_1' );

/** MySQL database password */
define( 'DB_PASSWORD', 'akJ6ddL5m89JNg2m' );

/** MySQL hostname */
define( 'DB_HOST', 'sql493.your-server.de' );

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
define( 'AUTH_KEY',         '*`bha|08HSp,sTn+{0^N`HY FdU>0PJfhxd7{nx70|.mWPpN,+&~r-~{#/nfpIc;' );
define( 'SECURE_AUTH_KEY',  'J0G^M0<U^-$MND(Y,lRRmv$r,DN0NX2(Dt5uk,T%-X0)-,p-Y2z`&7E$YGg m?-.' );
define( 'LOGGED_IN_KEY',    'hhEzsSyP6x^S8v<#SnMJMmC?IuHta8yK,&_?|C[_%QK<xq_X|Tf_yCsW*D<*=-qV' );
define( 'NONCE_KEY',        'AE3 98[;r4u&^&8kl&)wkOaMge{5Y?6eNUKjnl4?$1& Q}p7kw?~e4w_$gx8f!Nf' );
define( 'AUTH_SALT',        'zd[lGvF]kX%8y/s4ke9+Ksd1+k|(JtM oFbI:hHUwV]94_{OGl[YK`F|@O!Fi|LJ' );
define( 'SECURE_AUTH_SALT', '3)kXP3#..Q|bsZ{K%>x!q(:3kCQp|9|?9+2PcO0$}*@XJ1<(=|;E/i``2$]m.aEP' );
define( 'LOGGED_IN_SALT',   '{||4MQ&0j+4$5IBVt#QAeI^odBOS*>Q|OP1j%M(|>Q==(sRu$d0dVl1J6RquGF>/' );
define( 'NONCE_SALT',       'Dk.0go+/kf61?U?cHf-1iV9pWDV?|b!RUfccddMaZWp8 t+o!mc,Q)8J{t9T2v6p' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
