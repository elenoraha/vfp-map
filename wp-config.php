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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'raM//VI0Yjk6ug4Ga/FL4JLalg6jvrFLzDRilBHmtwPOVG2kqfR/zFfe4wKAqjar4u6Rd07OG6IvNO0NrnwKJw==');
define('SECURE_AUTH_KEY',  '9Fapea+ix5uHyO3PGhSx+miDuBqecRrlyoO98XvJGTLu8gFfROh3rKwNhN8GWc+YN92n0uX7zL5bfAk1AawcPg==');
define('LOGGED_IN_KEY',    'cEplv7iEcX4oLku9Z8SdIb7TND2mWcgN2ynIZObd0KOle+1WtDFRRyKsIeyq+nd3YMqX1ClW8q2c818+gp9s8A==');
define('NONCE_KEY',        'NyggR6LFND80ERHnoom+jmgV6vlajW3s9RJvX8QiEJ/BEnyFnv88iY1l03XkYugMhGOFmjnK6Tc51pZNQKQ1lQ==');
define('AUTH_SALT',        '3c911iM+AUv1AsLfERQO1HnwBLHLc2at2ZHnyAC6GmQOGS1ZHaZDN3ImVifq0HtOZKBAzUw6WCArBC2OUVZthA==');
define('SECURE_AUTH_SALT', 'zA4aR6ijBm9TlH6H10PPwFGbZ8IeKuphjoaqmJtIFPLcxaPOoLmm2rnYWUYarF/WkszpDvAKYElZcr0GKr7nJg==');
define('LOGGED_IN_SALT',   'sCrVpvktyDRSKWSupJubMw1YiYxkKfjNDwxTtP8oDt57IZrLkvEvxQdtLhXTh3mlSybKdbFyiob11IbOFc6P5w==');
define('NONCE_SALT',       'b2Dj19PBbFYJwHzNxOMbY0GnTEhhqqdAH6Q6Nyy/7ww8lJBFSWS3jgiocIilngqWwVvTko0EI+A3Dhh3M77+7w==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

// Enable WP_DEBUG mode
//define( 'WP_DEBUG', true );


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
