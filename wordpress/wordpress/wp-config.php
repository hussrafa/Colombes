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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'C!2J:=6-&]SiwIwY/+Y7^)v-{=}l!i5?c<%}x<CbzB60XF|}@#(b}k(Q$Og7C}S3' );
define( 'SECURE_AUTH_KEY',  'G1D`j)v@6_rPqed}Quc$rIQ`+AWI.3vrb:.l#88I<y6$&a3[7W{{TMWnWn<WBuG9' );
define( 'LOGGED_IN_KEY',    '>#;)|}itf|i7>hb8*#^R!06Y*Afk!0s:MPaw)PP_l`k?h} kBg%H-)DRA_2Vgy3]' );
define( 'NONCE_KEY',        '^Dc,sZSW=iZyUClMNUhStD!I{3dB1=:-!.08oqOYihpDo3DY[GekV_2aI==)(Ov]' );
define( 'AUTH_SALT',        '-ix+WIvE/*,x?xDSElNqVn+IpUY%1RD=E4;5`:bI0d!Lu@3h:Ia}>4^_XN9H.!/5' );
define( 'SECURE_AUTH_SALT', 'r;W{:FPTrkK#:Hp0.Dd|JKqx~) e<=jNJu0[MGP/5cl`JegK5~]NHHx<~D{U6B7g' );
define( 'LOGGED_IN_SALT',   'KGI#MW}*Ue}=X|lF%;YqAaj?JQ3@8}BSInmr9x3:t^Em/5(CK3H[<.nLf%v}B8 @' );
define( 'NONCE_SALT',       ' ~Hq{p1Rin3g3:@W/H.>/>2Vo{>lx1*-XBo>0$=rPB+l>haTc2@Ywo4@|$xE~kaY' );
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

