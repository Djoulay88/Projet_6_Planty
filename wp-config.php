<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link https://fr.wordpress.org/support/article/editing-wp-config-php/ Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @link https://fr.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'planty' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'root' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'root' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

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
define( 'AUTH_KEY',         '[2]rW~jZK)[o`p%5ra0I?J#Z%*8mwC0Z2bA<}?_rOLJPO8a=_{ZlZ:!wU-MfnRaA' );
define( 'SECURE_AUTH_KEY',  's-R!_E#BSfkpuG0>ABz)zWu)4bZyPPis|8h^.1EEvh$AUdi_%ZMW>^o9;Q&nQP9i' );
define( 'LOGGED_IN_KEY',    'S+fNBm0*F}oao0/,45QfD![Vak~WZSV$& Er.Jzdt=34.bM?Yi|(-/Vd^=_ip7)D' );
define( 'NONCE_KEY',        'E|*7yNDWU;4<w92/(MPn4(X0(2Ow{){gK0`t>vwLNMn><>0J e}^^id[|q?J5>ed' );
define( 'AUTH_SALT',        'M0~F!@nr*!Orw~,}RCMKcc!6u23[%DDhXv|tM0zjWiWOwk+{HBzb}$!]ZtW-Q!+r' );
define( 'SECURE_AUTH_SALT', '#;XD9,El.&eR@:++ L?KWx(}#De2uuOYnjEl3+&M[  .0,A$413u*K[)4v~}WhO/' );
define( 'LOGGED_IN_SALT',   'UXd]sV,(~ZOG? ThOc4)GZIb_ :D<~.xSLQdZuL(/P5+NE$>h&{Ub9e*G,B/$DlH' );
define( 'NONCE_SALT',       'j[x%7kUF@2p3KRA^ &MlDknF3TFgvf2KlM&VvxDIC6H-K^D/pVh|br.dYux;b[>y' );
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
 * Pour les développeurs et développeuses : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortement recommandé que les développeurs et développeuses d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur la documentation.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
