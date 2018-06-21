<?php

class DB {
    public $link;

    public function connect() {
        try {
            $config = require_once 'conf.php';

            $dsn = 'mysql:host='.$config['host'].';dbname='.$config['db'].';';

            $this->link = new PDO($dsn,$config['name'],$config['password']);

        } catch (PDOException $e) {
             print_r($e->getMessage());
            die('Соединение не установлено');
        }
    }

    public function exec($sql) {

        $sth = $this->link->prepare($sql);

        return $sth->execute();
    }

    public function query($sql) {

        $stmt = $this->link->prepare($sql);

        $stmt->execute();

        $result = $stmt->fetchALL(PDO::FETCH_ASSOC);

        if ($result === false) {
            return false;
        }

        return $result;
    }
}





