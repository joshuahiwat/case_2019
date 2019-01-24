<?php

namespace core;

use PDO;
use PDOException;

final class CoreApiFactory
{
    const HOST = "LOCALHOST";
    const DATABASE = "...";
    const USERNAME = "...";
    const PASSWORD = "...";

    /**
     * @return PDO
     */
    public function getDatabase()
    {
        $dbh = NULL;

        try {
            $dbh = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::DATABASE, self::USERNAME, self::PASSWORD);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die('DATABASE ERROR: ' . $e->getMessage());
        }

        return $dbh;
    }
}