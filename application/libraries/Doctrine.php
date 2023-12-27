<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class Doctrine
{
    public $em;

    public function __construct()
    {
        // Your Doctrine configuration
        $paths = ['application/entities'];
        $isDevMode = false;

        // Use the CodeIgniter database configuration for Doctrine connection
        include 'application/config/database.php';

        $conn = [
            'driver' => 'pdo_mysql',
            'user' => $db['default']['username'],
            'password' => $db['default']['password'],
            'host' => $db['default']['hostname'],
            'dbname' => $db['default']['database'],
            'charset' => $db['default']['char_set'],
        ];

        $config = Setup::createConfiguration($isDevMode);
        $config->setMetadataDriverImpl(
            new \Doctrine\ORM\Mapping\Driver\AttributeDriver(['application/entities'])
        );

        // Create a Doctrine\DBAL\Connection
        $dbalConfig = new \Doctrine\DBAL\Configuration();
        $connection = \Doctrine\DBAL\DriverManager::getConnection($conn, $dbalConfig);

        // Pass the Doctrine\DBAL\Connection to the EntityManager constructor
        $this->em = EntityManager::create($connection, $config);
    }
}
