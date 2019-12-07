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
        <tbody>
        <?php
            require ('../config.php');
            $def = new project1();
            $get = $def->getDB();
            
            $code = $_POST['code'];
            $data = $def->orderDataTransUser($code);
            while($d = $data->fetch(PDO::FETCH_OBJ)){
        ?>
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
            <?php } ?>
            <tr>
                <td colspan="3">Proof</td>
                <td>
                    <?php
                        $data1 = $def->orderDataTransUser($code);
                        $d1 = $data1->fetch(PDO::FETCH_OBJ);
                        $proof = $d1->proof;
                    ?>
                    <img src="../../asset/img/pict-proof/<?= $proof ?>" class="imgProofAdmin" alt="">
                </td>
            </tr>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('.imgProofAdmin').zoomify();
    });
</script>