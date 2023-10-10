<?php
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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
if(file_exists(dirname(__FILE__) . '/local.php')){
	define( 'DB_NAME', 'local' );
	define( 'DB_USER', 'root' );
	define( 'DB_PASSWORD', 'root' );
	define( 'DB_HOST', 'localhost' );
}
	else{
	define( 'DB_NAME', 'u217678937_bbeDB');
	define( 'DB_USER', 'u217678937_bbe');
	define( 'DB_PASSWORD', 'Jamesmath;)1');
	define( 'DB_HOST', 'localhost' );
}


/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}


define('AUTH_KEY','NGbsyyyi3hPpk7YTeN7Y0BFU3v+8jNxi1CWC3Ogd4ERQ7Bb9qjfKmqdnMIuBXtLFTgwQh1k45K6kF3afc7OeWg==');
define('SECURE_AUTH_KEY',  'YudtYff5t6Wv5kkLSnI3mTAcv+Q5YO7S2kHX+EZu/CXzTvB2bll73R+FlJSiOJ66gaMa54xZE//b3gJTqewHig==');
define('LOGGED_IN_KEY',    '2CZiCr7s8ifXk+UqyTvuJ/lrKABSVGmyuQUrVVUigZhyx4kXRHEmD9X/TyJftSpllSzPSo9zkl32CCfdFvGyTg==');
define('NONCE_KEY',        'srs4P2nSzDea3skukfeHvxwbiyIXvOw9Gr3D+vPHIjBqQRxF68cvTwcl5d2Sv/mZHaNSRdcIBPbAVCVHZzK9cw==');
define('AUTH_SALT',        'KNL74npyrMJrkLXeiznvr+UxFGDvcwZU/W54GZ2JWMKcn1/3ZYUKFyKDSx+jMcOQRqk9FBPBJjEdBRJrXaxnDw==');
define('SECURE_AUTH_SALT', 'wyKPAiOIJyyo3ELn60mYKnqMEUF2nED09otRaomSQTRXTpnnUZnV1xSwajBlqTyzo9lv3IUk719IOYaYTP4hoA==');
define('LOGGED_IN_SALT',   'Q0FlZ5mSWEZGOjbSNJTbcYHHs1onpo6orJ0NEJm1CNuaeTIVxsryjlseXtxvBLxFba/NzMGhPckF+UVyJYIk8Q==');
define('NONCE_SALT',       'Lt8vXr/fQkGrOcnbktUNa7htVixyCogjiq6D/WKG1JRo0rjefvTu+vZV9KOq3RjTtfOl1f5pbn9SqDpfYt9SmQ==');
define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
