<?php
// bootstrap.php
require_once "vendor/autoload.php";

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup as ORMSetup; // Corrected namespace alias

// Include the CodeIgniter database configuration
include 'application/config/database.php';

$paths = ['application/entities'];
$isDevMode = false;

// Use the CodeIgniter database configuration for Doctrine connection
$conn = [
    'driver' => 'pdo_mysql',
    'user' => $db['default']['username'],
    'password' => $db['default']['password'],
    'host' => $db['default']['hostname'],
    'dbname' => $db['default']['database'],
    'charset' => $db['default']['char_set'],
];

$config = ORMSetup::createAnnotationMetadataConfiguration($paths, $isDevMode);
$connection = DriverManager::getConnection($conn, $config);
$entityManager = new EntityManager($connection, $config);
