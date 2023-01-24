<?php

//require_once ("../config/config.php");  

    class DB{
        protected $dbh;

        protected function getInstance(){
            try {
				$conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=final_project","root",);
				return $conectar;	
			} catch (Exception $e) {
				print "¡Error BD!: " . $e->getMessage() . "<br/>";
				die();	
			}
        }

        public function setCharsetValue(){	
			return $this->dbh->query("SET NAMES 'DB_CHARSET'");
        }
    }
   ?>

