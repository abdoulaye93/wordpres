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
define( 'DB_NAME', 'plugin' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'GVcz+TinuDAaHlE7!>ddQ_2mJK*([~.7<y`YM`J }BxW`fd3nM/OrWG*z9CZv3A9' );
define( 'SECURE_AUTH_KEY',  '.w9F5Q$#-1Y`5!p]=3i,1g8KfRQe9bS%HP$`(t?dcgN1j ]p1tM=N(>e%$B+XsRL' );
define( 'LOGGED_IN_KEY',    '~[$iHDlk#k?3mYn(kz7WaQGWxym|Adzsw1j}7@]x:9:Mm_)c#6*E:JxRZc-cqQ<N' );
define( 'NONCE_KEY',        'lL)~q/+0gZ}@(X6I4)e 8D f.+:[Yb89PYyK_nAi^ m3Omr{pE30/1Q.~-t<w.nk' );
define( 'AUTH_SALT',        'b;4*IQBY/ReS@fIF(Z(VUNL~5l3M!g`c76OuDI+*r+C29O7O5,o=ewr?Q!Fx-1&j' );
define( 'SECURE_AUTH_SALT', '!!Gvq!d%P=rH w?lbVbDJ,r(I]l@F9V2{59~Q#/C OK5n:JC@[3zWm2&&-y7u,d|' );
define( 'LOGGED_IN_SALT',   '&B_,A*8k QSBnB{.3?he;O~->Tz*aKMI)ZH]9[,00i]RvQ5Cw.K&C!eDqv)MPL.=' );
define( 'NONCE_SALT',       '3aWOCmX!4{Xm5 +3RPbP7]QBH8Q:!6X@!oYh5fcH4HFoAmOOYg;0#u),l-:kyoH5' );
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
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
