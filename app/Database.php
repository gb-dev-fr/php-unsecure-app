<?php

namespace App;

class Database
{
    /**
     * @var \PDO
     */
    private $pdo;

    /**
     * @var Database
     */
    private static $databaseInstance;

    public static function getInstance(Request $request)
    {
        if(self::$databaseInstance === null) {
            self::$databaseInstance = new Database(
                "127.0.0.1",
                "unsecure",
                "root",
                "monroot"
            );
        }
        return self::$databaseInstance;
    }

    /**
     * Database constructor.
     * @param string $host
     * @param string $dbName
     * @param string $user
     * @param string $password
     */
    public function __construct($host, $dbName, $user, $password)
    {
        $this->pdo = new \PDO('mysql:host='.$host.';dbname='.$dbName.'', $user, $password);
    }

    /**
     * @return \PDO
     */
    public function getPdo()
    {
        return $this->pdo;
    }
}