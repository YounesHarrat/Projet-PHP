<?php

namespace App\Core;

use PDO;
use PDOException;

class Db extends PDO {
    private static $instance;

    # on renseigne les paramètres de connexion
    private const DBHOST = 'localhost';
    private const DBUSER = 'root';
    private const DBPASS = '';
    private const DBNAME = 'film';

    private function __construct()
    {
        # on crée la connexion
        $pdo = 'mysql:dbname=' . self::DBNAME . ';host=' . self::DBHOST;
        try {
            parent::__construct($pdo, self::DBUSER, self::DBPASS);
            $this->setattribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            # en cas d'erreur, on récupère le message d'erreur
            die($e->getMessage());
        }
    }
    # on crée un singleton
     
    public static function getInstance() {
        if(self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}