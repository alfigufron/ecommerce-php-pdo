<?php
    require ('../../config.php');
    $id = $_GET['id'];
    $def = new project1();
    $get = $def->getDB();
    $sql = "DELETE FROM tbl_user WHERE id=:id ";
    $statement = $get->prepare($sql);
    $statement->execute(array(':id'=>$id));
    if(!$statement){
        echo "  <script>
                    alert('Gagal dihapus!');
                    window.location.href='data-user.php';
                </script>";
    }else{
        echo "  <script>
                    alert('Berhasil dihapus!');
                    window.location.href='data-user.php';
                </script>";
    }
?>