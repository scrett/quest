<?php
// bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";
//Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('views');
//$twig = new Twig_Environment($loader, array( 'cache' => 'cache'));
$twig = new Twig_Environment($loader);

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
$config = Setup::createAnnotationMetadataConfiguration(array("./src"), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);
// or if you prefer yaml or XML
//$config = Setup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
//$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

// database configuration parameters
$conn = array(
    'dbname' => 'webstd',
    'user' => 'user',
    'password' => 'qazxcdews',
    'host' => 'localhost',
    'driver' => 'pdo_mysql'
);

// obtaining the entity manager
 $entityManager = EntityManager::create($conn, $config);
 $GLOBALS['entityManager']=$entityManager;
 $GLOBALS['twig']=$twig;