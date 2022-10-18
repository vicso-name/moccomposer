<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

/** Enable W3 Total Cache */

/** Enable W3 Total Cache */

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
define('DB_NAME', 'mocstage');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
<<<<<<<<< Temporary merge branch 1
define('DB_PASSWORD', 'Master123@2022');
=========
define('DB_PASSWORD', '');
>>>>>>>>> Temporary merge branch 2

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/** HelloSign */
define('HELLOSIGN_TEST_MODE', true);
define('HELLOSIGN_API_KEY', '1816ab0cf50acda5c936a420c8785b2739171b80172234c152c5641cbe3b63c7');
define('HELLOSIGN_TEMPLATE_ID', '23e5ac5490f414559c1b5e41c122ac9c310ccfcf');
define('HELLOSIGN_MANAGER_EMAIL', 'gershpion@gmail.com');
define('HELLOSIGN_MANAGER_NAME', 'Shpion');
define('HELLOSIGN_NAME_ID', 1);
define('HELLOSIGN_EMAIL_ID', 10);
define('HELLOSIGN_COMPANY_ID', 7);
define('HELLOSIGN_ADDRESS_ID', 8);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '[JgNS`LR I+zGiE+@!FziiFV&u9xaMa -U8Fyf(Szp=3ip705Iv@{teg9G&OqOF|');
define('SECURE_AUTH_KEY',  'zlreP-=3VEJg~8ok@7h0pg2$>]{h3cTt~kPwqt7~w{S@.9t:nUm5c+3]r+1tI*OM');
define('LOGGED_IN_KEY',    '<,jp{[BR`I?k-s9#?N^9:SKU@DNi5<8boh,e)Ens+X1MZ+G-@Bi!Av{2gIj~;Mcq');
define('NONCE_KEY',        'x iNVk}C`#H.jVn7YJ5<>+w]W3oKjHpOnD)4>+:LtxJWl&1h3YB$%tDK|k8x6-v:');
define('AUTH_SALT',        ' 1V&j-BWpKVP>{:*5(**D`;|ViQi;[Rn!B#By7NutRby{L<#TY5(^KK+gK!bz|QU');
define('SECURE_AUTH_SALT', '0E,||.VHI2$E1nZ1*WN=n(fZN3uvRxMvci -;wcZg&@cMK.l4y)>cWAG!XUd{3n/');
define('LOGGED_IN_SALT',   'md,~bV?Py1?|ezJjm2d+l^8|C{t*i3R4;K^A|}!$AmUTr2oCfBZ4EG)$aKk^fY,!');
define('NONCE_SALT',       'D hk-c [>yZ*$s.;6IjlIFWL(;hY^:fv,?wIRCchxIrV%)#k><Xz=T.gA`6[;kg7');

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
define('WP_DEBUG_LOG', true);
define('FS_METHOD', 'direct');
define('ENABLE_CACHE', true );
define('CACHE_EXPIRATION_TIME', 900);
define('ALLOW_UNFILTERED_UPLOADS', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
