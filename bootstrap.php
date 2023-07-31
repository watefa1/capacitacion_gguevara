<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once 'vendor/autoload.php';

// Ruta a tus entidades (modelos)
$entitiesPath = [__DIR__ . '/src/Entity'];

// Configuración de la conexión a la base de datos (puedes cambiar los valores según tu configuración)
$dbParams = [
    'driver' => 'mysqli',
    'host' => 'db-development.cbq3cbjddsma.us-east-1.rds.amazonaws.com',
    'user' => 'db_user',
    'password' => 'ERFJF7p7My5xXjSKRv5Njf69ea2BStS2XJRzSW9Vs',
    'dbname' => 'gguevarapractica',
];

$config = Setup::createAnnotationMetadataConfiguration($entitiesPath, true);
$entityManager = EntityManager::create($dbParams, $config);

return $entityManager;
