<div class="detail">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Goods Name</th>
                <th>lots</th>
                <th>Price</th>
                <th>Note</th>
            </tr>
        </thead>
        <?php
            require ('../config.php');
            $def = new project1();
            $get = $def->getDB();
            
            $code = $_POST['code'];
            $data = $def->orderDataTransUser($code);
            while($d = $data->fetch(PDO::FETCH_OBJ)){
        ?>
        <tbody>
            <tr>
                <td><?= $d->goods_name ?></td>
                <td><?= $d->lots ?></td>
                <td><?= $d->price ?></td>
                <td>
                    <?php
                        if($d->note == NULL){
                            echo "No Notes";
                        }else{
                            echo $d->note;
                        }
                    ?>
                </td>
            </tr>
        </tbody>
        <?php } ?>
    </table>
</div>