<?php
    session_start();
    class project1{ //Class Project1
        protected $db; //Mprotect dalam bahasa inggris yaitu melindungi $db
        function __construct(){ //Membuat function 
            $driver     = "mysql"; 
            $host       = "sql213.ezyro.com";
            $dbname     = "ezyro_24858096_db_project1";
            $charset    = "utf8mb4";
            $user       = "ezyro_24858096";
            $password   = "gxc5vluu03u5m0";
            $option     = NULL;

            $dsn        = "${driver}:host=${host};dbname=${dbname};charset=${charset}";
            // membuat variabel untuk menyambunbgkan ke database
            try{
                $this->db = new PDO($dsn, $user, $password, $option);
            }catch(\PDOException $e){
                throw new \PDOException($e->getMessage(), (int)$e->getCode());
            }
        }
        public function getDB(){ //membuat function
            return $this->db;                          
        }
        public function addAdmin($code, $name, $username, $hashed){
            $sql = "INSERT INTO tbl_admin (code, name, username, password) VALUES (:code, :name, :username, :password)";
		    $stmt = $this->db->prepare($sql);
		    $stmt->execute(array(':code'=>$code, ':name'=>$name, ':username'=>$username, ':password'=>$hashed));
		    if(!$stmt) {
		    	return "gagal";
		    }else{
		    	return "sukses";
		    }
        }
        public function logAdmin($username, $password){
            $sql = "SELECT * FROM tbl_admin WHERE username=:username";
            $stmt = $this->db->prepare($sql);
            if($stmt->execute(array(':username'=>$username))){
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if(password_verify($password, $result['password'])){
                    $_SESSION['codeadmin'] = $result['code'];
                    return "sukses";
                }else{
                    return "gagal";
                }
            }else{
                return "gagal";
            }
        }
        public function registerUser($random,$name,$email,$phone,$username,$hashed,$birth,$address,$picture){
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
                $statement->execute(array(':code'=>$random, ':name'=>$name, ':username'=>$username, ':password'=>$hashed, ':birth'=>$birth, 
                ':email'=>$email, ':phone'=>$phone, ':address'=>$address, ':picture'=>$newname ));
                if(!$statement) {
                    return "gagal";
                } else {
                    return "sukses";
                }
            }
        }
        public function registerUserAdmin($random,$name,$email,$phone,$username,$hashed,$birth,$address,$picture){
            $namepicture = $picture['name'];
            $loctmp = $picture['tmp_name'];
            $allowed = array('png', 'jpg', 'jpeg');
            $dot = explode('.', $namepicture);
            $ext = strtolower(end($dot));
            $newname = mt_rand(1,99).$username.'.'.$ext;
            if(in_array($ext, $allowed) === TRUE) {
                move_uploaded_file($loctmp, '../../asset/img/pict-acc/'.$newname);
                $sql = "INSERT INTO tbl_user (code, name, username, password, birth, email, phone_number, address, picture) 
                VALUES (:code, :name, :username, :password, :birth, :email, :phone, :address, :picture)";
                $statement = $this->db->prepare($sql);
                $statement->execute(array(':code'=>$random, ':name'=>$name, ':username'=>$username, ':password'=>$hashed, ':birth'=>$birth, 
                ':email'=>$email, ':phone'=>$phone, ':address'=>$address, ':picture'=>$newname ));
                if(!$statement) {
                    return "gagal";
                } else {
                    return "sukses";
                }
            }
        }
        public function logUser($username, $password) {
            $login = "SELECT * FROM tbl_user WHERE username=:username";
            $statement = $this->db->prepare($login);
            if($statement->execute(array(':username' => $username))) {
                $result = $statement->fetch(PDO::FETCH_ASSOC);
                if(password_verify($password, $result['password'])) {
                    $_SESSION['code'] = $result['code'];
                    return "sukses";
                }else {
                    return "gagal";
                }
            }else {
                return "DBGagal";
            }
        }
        public function addInventory($random, $name, $price, $stock, $note, $category, $photo){
            $namephoto = $photo['name'];
            $loctmp = $photo['tmp_name'];
            $allowed = array('png', 'jpg', 'jpeg');
            $dot = explode('.', $namephoto);
            $ext = strtolower(end($dot));
            $newname = mt_rand(1,99).$random.'.'.$ext;
            if(in_array($ext, $allowed) === TRUE){
                move_uploaded_file($loctmp, '../../asset/img/pict-goods/'.$newname);
                $sql = "INSERT INTO tbl_goods (code_goods, name, picture, price, stock, note, category)
                VALUES (:code, :name, :photo, :price, :stock, :note, :category)";
                $statement = $this->db->prepare($sql);
                $statement->execute(array(':code'=>$random, ':name'=>$name, ':photo'=>$newname, 
                ':price'=>$price, ':stock'=>$stock, ':note'=>$note, ':category'=>$category));
                if(!$statement){
                    return "gagal";
                }else{
                    return "sukses";
                }
            }
        }
        public function addCart($cart_codeuser, $cart_codegoods, $cart_goodsname, $cart_lots, $cart_size, $cart_total, $cart_note){
            $sql = "INSERT INTO tbl_cart (codeuser, codegoods, goodsname, lots, size, price, note)
            VALUES (:codeuser, :codegoods, :goodsname, :lots, :size, :price, :note)";
            $statement = $this->db->prepare($sql);
            $statement->execute(array(':codeuser'=>$cart_codeuser, ':codegoods'=>$cart_codegoods, ':goodsname'=>$cart_goodsname, 
            ':lots'=>$cart_lots, ':size'=>$cart_size, ':price'=>$cart_total, ':note'=>$cart_note));
            if(!$statement){
                return "gagal";
            }else{
                return "sukses";
            }
        }
        public function sendProof($transaction_code, $proofPicture){
            function ngacak($digit){
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
            $namephoto = $proofPicture['name'];
            $loctmp = $proofPicture['tmp_name'];
            $allowed = array('png', 'jpg', 'jpeg');
            $dot = explode('.', $namephoto);
            $ext = strtolower(end($dot));
            $newname = mt_rand(1,99).$random.'.'.$ext;
            if(in_array($ext, $allowed) === TRUE){
                move_uploaded_file($loctmp,'asset/img/pict-proof/'.$newname);
                $sql = "UPDATE tbl_order SET proof=:proof WHERE transaction_code=:transaction_code";
                $statement = $this->db->prepare($sql);
                $statement->execute(array(':proof'=>$newname, ':transaction_code'=>$transaction_code));
                if(!$statement){
                    return "gagal";
                }else{
                    return "sukses";
                }
            }
        }
        public function dataUser(){
            $sql = "SELECT * FROM tbl_user";
            $stmt = $this->db->prepare($sql);
            if($stmt->execute()){
                return $stmt;
            }
        }
        public function dataUserDetail($codeUser){
            $sql = "SELECT * FROM tbl_user WHERE code=:codeuser";
            $stmt = $this->db->prepare($sql);
            if($stmt->execute(array(':codeuser'=>$codeUser))){
                return $stmt;
            }
        }
        public function goodsData(){
            $sql = "SELECT * FROM tbl_goods";
            $stmt = $this->db->prepare($sql);
            if($stmt->execute()){
                return $stmt;
            }
        }
        public function orderData(){
            $sql = "SELECT * FROM tbl_order";
            $stmt = $this->db->prepare($sql);
            if($stmt->execute()){
                return $stmt;
            }
        }
        public function orderDataDetail($codeuser){
            $sql = "SELECT * FROM tbl_order WHERE user_code=:codeuser";
            $stmt = $this->db->prepare($sql);
            if($stmt->execute(array(':codeuser'=>$codeuser))){
                return $stmt;
            }
        }
        public function cartData($codeuser){
            $sql = "SELECT * FROM tbl_cart WHERE codeuser=:user";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(array(':user'=>$codeuser));
            if(!$stmt){
                return "gagal";
            }else{
                return $stmt;
            }
        }
        public function orderDataGroup(){
            $sql = "SELECT * FROM tbl_order GROUP BY transaction_code";
            $stmt = $this->db->prepare($sql);
            if($stmt->execute()){
                return $stmt;
            }
        }
    }
?>