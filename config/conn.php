<?php
    session_start();

    class DB{
        
        protected $db;
        function __construct() {
            $driver = "mysql";
            $host = "localhost";
            $dbname = "db_project1";
            $charset = "utf8mb4";
            
            $user = "root";
            $pw = "";
            $options = NULL;

            

            $dsn = "${driver}:host=${host};dbname=${dbname};charset=${charset}";

            try {
                $this->db = new PDO($dsn, $user, $pw, $options);
            } catch(\PDOException $e) {
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }
        }

        public function getDB() {
            return $this->db;
        }

        public function register($name,$email,$phone,$username,$hashed,$birth,$address,$picture) {
            function ngacak($digit)
            {
                $karakter = '1234567890';
                $string = '';

                for($i=0; $i<$digit; $i++)
                {
                    $post = rand(0, strlen($karakter)-1);
                    $string .= $karakter{$post};
                };
                return $string;
            };
            $random = ngacak(10);

            $namepicture = $picture['name'];
            $loctmp = $picture['tmp_name'];

            $allowed = array('png', 'jpg', 'jpeg');
            $dot = explode('.', $namepicture);
            $ext = strtolower(end($dot));
            $newname = mt_rand(1,99).$username.'.'.$ext;

            if(in_array($ext, $allowed) === TRUE) {
                move_uploaded_file($loctmp, '../asset/img/pict-acc/'.$newname);
                $sql = "INSERT INTO tbl_user (code, name, username, password, birth, email, phone_number, address, picture) 
                VALUES (:code, :name, :username, :password, :birth, :email, :phone, :address, :picture)";
                $statement = $this->db->prepare($sql);
                $statement->execute(array('code'=>$random, ':name'=>$name, ':username'=>$username, ':password'=>$hashed, ':birth'=>$birth, 
                ':email'=>$email, ':phone'=>$phone, ':address'=>$address, ':picture'=>$newname ));
                if(!$statement) {
                    return "gagal";
                } else {
                    return "sukses";
                }
            }
        }

        public function login($user, $pw) {
            $login = "SELECT * FROM tbl_user WHERE username=:username LIMIT 1";
            $statement = $this->db->prepare($login);
            if($statement->execute(array(':username' => $user))) {
                $result = $statement->fetch(PDO::FETCH_ASSOC);
                if(password_verify($pw, $result['password'])) {
                    $_SESSION['code'] = $result['code'];
                    return "sukses";
                }else {
                    return "gagal";
                }
            }else {
                return "DBGagal";
            }
        }

        public function loginadmin($useradmin, $pwadmin) {
            $query = "SELECT * FROM tbl_admin WHERE username=:username";
            $statement = $this->db->prepare($query);
            if($statement->execute(array(':username' => $useradmin))) {
                $result = $statement->fetch(PDO::FETCH_ASSOC);
                if(password_verify($pwadmin, $result['password'])) {
                    $_SESSION['code'] = $result['code'];
                    return "sukses";
                }else {
                    return "gagal";
                }
            }else {
                return "DBGagal";
            }
        }

    }
?>