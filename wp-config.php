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
define( 'DB_NAME', 'wordpresstheme' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '/4kr9o}$3#=?t4Ve?6uhqk;KLo-uN.HaY$J%uZbxY{DVGX8BbK?vr] I(w~QlKX7' );
define( 'SECURE_AUTH_KEY',  '_V29^IQvk?{?FO]!Gg,GVs-A+!>6!.a5tR.MbK9q5`*/0`>E,%Rz49j~jB41IG)a' );
define( 'LOGGED_IN_KEY',    'CJ`3>-=$@<ye.=Fr0M-Tts[.{T`7{%0lvCk(G4c. 37Ks<E.5_m6hu%k3iDZi@V3' );
define( 'NONCE_KEY',        'f6 )h9+QgTq}mI@FPBji(@W+9k8lX{IU06A$+Opcd6*AA#xEdch@h8KD^@Qob4-/' );
define( 'AUTH_SALT',        '6//9!2f;P3zd|z|i,g3*rPE5XJCNN:Q,dx/$iw8_-YKP@E@ ZW+z__h7;}|WMDj4' );
define( 'SECURE_AUTH_SALT', '}Upfw<X!v@!7E6Mh2n9jh0#|`L#Pu_s@4e95cGCq]n;XNa_/lWK}e777A~`8(m~)' );
define( 'LOGGED_IN_SALT',   '%C ,`C6?vwmLw1(-f@1,0Pw=&1:D3l$;Hv EwJ`p1EU6-=X-s/Lq/>U!YM7w28 |' );
define( 'NONCE_SALT',       '%~$8rI6[^/g,e~KU M$Q`kF.I~Z1AG]^Wa$NVU%[=|9CK7OPU>fwD`_[,=_iV3JY' );
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

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( ! defined( 'ABSPATH' ) )
  define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once( ABSPATH . 'wp-settings.php' );
