<?php 
    interface connectDatabase{
        public function connection();
    }
  
    class connectMariaDB implements connectDatabase{
        private $host,$database_name,$username,$password;
        public function setHost($host){
            $this->host = $host;
        }
        public function setDatabase($db_name){
            $this->database_name = $db_name;
        }
        public function setUserName($userName){
            $this->username = $userName;
        }
        public function setPassword($passWord){
            $this->password = $passWord;
        }
        public function connection()
        {
            $conn =  mysqli_connect( $this->host, $this->username, $this->password, $this->database_name);
            if(!$conn){
                die('Could not connect: ' . mysqli_connect_errno());
            }
            return $conn;
        }
    }

    class connectionFactory {
        private $driver = null;
        public function setDriver($driver){
            $this->driver = $driver;
        }
        public function connect($host,$username,$password,$database_Name){
            switch($this->driver){
                case 'mariaDB':
                    $DB = new connectMariaDB();
                break;
                default:
                    $DB = new connectMariaDB();
            }
            $DB -> setHost($host);
            $DB -> setUserName($username);
            $DB -> setPassword($password);
            $DB -> setDatabase($database_Name);
            return $DB -> connection();
        }
    }