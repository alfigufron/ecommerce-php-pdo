<?php
    require ('../../config.php');
    $transCode = $_GET['transCode'];
    $def = new project1();
    $get = $def->getDB();
    $sql = "DELETE FROM tbl_order WHERE transaction_code=:id ";
    $statement = $get->prepare($sql);
    $statement->execute(array(':id'=>$transCode));
    if(!$statement){
        echo "  <script>
                    alert('Gagal dihapus!');
                    window.location.href='payment.php';
                </script>";
    }else{
        echo "  <script>
                    alert('Berhasil dihapus!');
                    window.location.href='payment.php';
                </script>";
    }
?>