<?php
    session_start();
    class DBadmin{
        protected $admin;
        function __construct(){
            $driver     = "mysql";
            $host       = "localhost";
            $dbname     = "db_project1";
            $charset    = "utf8mb4";

            $user       = "root";
            $pw         = "";
            $options    = NULL;

            $dsn="${driver}:host=${host};dbname=${dbname};charset=${charset}";

            try{
                $this->admin=new PDO($dsn,$user,$pw,$options);
            }catch(\PDOException $e){
                throw new \PDOException($e->getMessage(),(int)$e->getCode());
            }
        }
        public function getDB(){
            return $this->$admin;
        }
        public function login($user, $pw){
            $query      = "SELECT * FROM tbl_admin WHERE username=:username";
            $statement  = $this->admin->prepare($query);
            if($statement->execute(array(':username'=>$useradmin))){
                $result = $statement->fetch(PDO::FETCH_ASSOC);
                if(password_verify($pwadmin,$result['password'])){
                    $_SESSION['code']   = $result['code'];
                    return "sukses";
                }else{
                    return "gagal";
                }
            }else{
                return "DBGagal";
            }
        }
    }
?>