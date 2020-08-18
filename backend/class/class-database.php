<?php
    require_once __DIR__.'../../vendor/autoload.php';
    use Kreait\Firebase\Factory;
    class Database{ 
        private $keyFile = __DIR__.'../../secret/glovo-cf5f0-af936ba91e99.json';
        private $URL = 'https://glovo-cf5f0.firebaseio.com/';
        private $db;
        public function __construct()
        {
            $firebase = (new Factory)
            ->withServiceAccount($this->keyFile)
            ->withDatabaseUri($this->URL)
            ->create();
            $this->db = $firebase->getDatabase();
        }
        public function getDB(){
            return $this->db;
        }
    }
?>
