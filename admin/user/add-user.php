<?php
    require ('../../config.php');
    if (isset($_POST['register'])){
        echo "<script>alert('Test')</script>";
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

        $random = ngacak(8);
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $phone = filter_input(INPUT_POST, 'phone-number', FILTER_SANITIZE_STRING);
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $pw = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $birth = filter_input(INPUT_POST, 'birth', FILTER_SANITIZE_STRING);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
        $hashed = password_hash($pw, PASSWORD_DEFAULT);
        $picture = $_FILES['photo'];
        $def = new project1();
        $add = $def->registerUser($random,$name,$email,$phone,$username,$hashed,$birth,$address,$picture);
        if($add = "berhasil") {
            // header("location:login.php");
            echo "<script>alert('berhasil')</script>";
        } else {
            echo "<script>alert('gagal')</script>";
        }
    }else{
        echo "<script>alert('Tester')</script>";
    }
?>
<div class="content-user">
    <div class="content-add-user">
        <h3>Add User</h3>
        <form role="form" action="" method="post" enctype="multipart/form-data">
        <div class="card">
            <div class="card-body">
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" class="form-control" id="" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control" id="" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label for="">Phone Number</label>
                        <input type="number" name="phone-number" class="form-control" id="" placeholder="Enter Phone Number">
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control" id="" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="text" name="password" class="form-control" id="" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                        <label for="">Birth</label>
                        <input type="date" name="birth" class="form-control" id="" placeholder="Enter Birth">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" name="address" rows="3" placeholder="Enter Address"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Photo</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="photo" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="card-footer">
                <button type="submit" name="register" class="btn btn-primary w-100">Submit</button>
            </div>
        </div>
        </form>
    </div>
</div>