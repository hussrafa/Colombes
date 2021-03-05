<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en « wp-config.php » et remplir les
 * valeurs.
 *
 * Ce fichier contient les réglages de configuration suivants :
 *
 * Réglages MySQL
 * Préfixe de table
 * Clés secrètes
 * Langue utilisée
 * ABSPATH
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'onlinestore' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'greta' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/**
 * Type de collation de la base de données.
 * N’y touchez que si vous savez ce que vous faites.
 */
define( 'DB_COLLATE', '' );

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clés secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '-`XC&ZU$;B|7 MlG<pM,U(ja9k,I^X*x3,3)R9z_n2zi/xLQ]bj2Cb5z>W4Bi(kv' );
define( 'SECURE_AUTH_KEY',  '^A9/5#32B-[OSJ(lZvYAS;/2]Wj?p{|C,H6>W1oLkUiR9-#rek1,*hY#PVg0H}V:' );
define( 'LOGGED_IN_KEY',    'uWY*UeIf_5Sp7f`=Hb4n1eD99[1UM|`M&JFEatWr8gMd)Gv[XPm:Z>Vx2I8%x-Qp' );
define( 'NONCE_KEY',        'E5f:}wxVLybu$Yi<tqEpj-grQxSU#6vqHhzXB,og+SiIB Zcofh+_S}Q |!Ne=`!' );
define( 'AUTH_SALT',        '^x~1~jZK@*#ag{a/Ii||o:W54sY-+J0ZNUIV+}]EW3ukR~lYFs2z3CLY,zxaI6jI' );
define( 'SECURE_AUTH_SALT', '/l<NG_b4lTk+O,-qlk5]yn*)!v~:}S{mem~ecj/EVbB,WV]Mu*tgp?82@+U#gMy(' );
define( 'LOGGED_IN_SALT',   'sW?xyWj4xo=qqt~GMwf<<4:8,?}KOzo1CguBR9gC54/j{w{h72v3zfv*5(<ugiYA' );
define( 'NONCE_SALT',       'gz<h%glM<5MskL:*!YCOCs^FZb=Oj9by*3:;6uA$ejB.7@Vk%]D4i9d=l<~8qO99' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
define('FS_METHOD','direct');
/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
