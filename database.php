<?php

namespace App;


class Database 
{
    protected static $instance;
    private  $host;
    private  $username;
    private  $password;
    private  $db;

    private function connect() {
        $this->host = 'us-cdbr-east-04.cleardb.com';
        $this->username = 'bd62a2a6970970';
        $this->password = '1794db72';
        $this->db = 'integer_spiral_db';
        try {
            $db = new \PDO('mysql:host='. $this->host .';dbname='.$this->db , $this->username, $this->password);
            $db->exec("set names utf8");
            return $db;
        } catch (\PDOException $e) {
            throw new \Exception("Veri tabanı hatası!: " . $e->getMessage());
            die();
        }
    }

    public  static function getInstance(){
        if (!isset(self::$instance)) {
            self::$instance = new static();
            return self::$instance->connect();
        }else{
            return self::$instance->connect();
        }
    }
}



//mysql://bd62a2a6970970:1794db72@us-cdbr-east-04.cleardb.com/heroku_2b9ee154d92e8d8?reconnect=true