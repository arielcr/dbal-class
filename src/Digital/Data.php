<?php

namespace Digital;

use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;

class Data
{
    private $db = NULL;

    public function __construct()
    {
        $this->dbConnect();
    }

    private function dbConnect()
    {
        $config = new Configuration();

        $connectionParams = array(
            'dbname' => Config::DB_NAME,
            'user' => Config::DB_USERNAME,
            'password' => Config::DB_PASSWORD,
            'host' => Config::DB_SERVER,
            'driver' => 'pdo_mysql',
        );

        $this->db = DriverManager::getConnection($connectionParams, $config);
    }

    public function getRecords()
    {
        $row = 1;
        $records = $this->db->fetchAll('SELECT * FROM table WHERE row = ?', array($row));
        return $records;
    }


}

