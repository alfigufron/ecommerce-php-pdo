<?php
    session_start();
    class project1{ //Class Project1
        protected $db; //Mprotect dalam bahasa inggris yaitu melindungi $db
        function __construct(){ //Membuat function 
            $driver     = "mysql"; 
            $host       = "localhost";
            $dbname     = "db_project1";
            $charset    = "utf8mb4";
            $user       = "root";
            $password   = "";
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
        public function accPayment($transCode){
            date_default_timezone_set('Asia/Jakarta');
            $dateNow = date("d F Y H:i:s");
            $queryGoods = "SELECT * FROM tbl_order WHERE transaction_code=:transCode ";
            $statement1 = $this->db->prepare($queryGoods);
            $statement1->execute(array(':transCode'=>$transCode));
            while($d = $statement1->fetch(PDO::FETCH_OBJ)){
                $transCodeNew = $d->transaction_code;
                $userCode = $d->user_code;
                $goodsCode = $d->goods_code;
                $goodsName = $d->goods_name;
                $lots = $d->lots;
                $price = $d->price;
                $note = $d->note;
                $shippingAddress = $d->shipping_address;
                
                $queryInsert = "INSERT INTO tbl_transaction (transaction_code,user_code,goods_code,goods_name,lots,price,note,shipping_address,transaction_date)
                VALUES (:transCode,:userCode,:goodsCode,:goodsName,:lots,:price,:note,:shippingAddress,:dateNow)";
                $statement = $this->db->prepare($queryInsert);
                $statement->execute(array(':transCode'=>$transCodeNew,':userCode'=>$userCode,':goodsCode'=>$goodsCode,':goodsName'=>$goodsName,':lots'=>$lots,
                ':price'=>$price,':note'=>$note,':shippingAddress'=>$shippingAddress,':dateNow'=>$dateNow));
            }
            if(!$statement){
                return "gagal";
            }else{
                $queryDelete = "DELETE FROM tbl_order WHERE transaction_code=:transCode";
                $nextStatement = $this->db->prepare($queryDelete);
                $nextStatement->execute(array(':transCode'=>$transCode));
                if($nextStatement){
                    return "sukses";
                }else{
                    return "gagal";
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
        public function dataTransaction(){
            $sql = "SELECT * FROM tbl_transaction";
            $stmt = $this->db->prepare($sql);
            if($stmt->execute()){
                return $stmt;
            }
        }
        public function dataTrans($codeuser){
            $sql = "SELECT * FROM tbl_transaction WHERE user_code=:codeuser GROUP BY transaction_code";
            $stmt = $this->db->prepare($sql);
            if($stmt->execute(array(':codeuser'=>$codeuser))){
                return $stmt;
            }
        }
        public function orderDataDetail($codeuser){
            $sql = "SELECT * FROM tbl_order WHERE user_code=:codeuser GROUP BY transaction_code";
            $stmt = $this->db->prepare($sql);
            if($stmt->execute(array(':codeuser'=>$codeuser))){
                return $stmt;
            }
        }
        public function orderDataTransUser($code){
            $sql = "SELECT * FROM tbl_order WHERE transaction_code=:code";
            $stmt = $this->db->prepare($sql);
            if($stmt->execute(array(':code'=>$code))){
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
        public function confirmGoods($id,$setConfirm){
            $sql = "UPDATE tbl_transaction SET confirm=:setConfirm WHERE id=:id";
            $statement = $this->db->prepare($sql);
            $statement->execute(array(':id'=>$id, ':setConfirm'=>$setConfirm));
            if(!$statement){
                return "gagal";
            }else{
                return "sukses";
            }
        }
    }
?>