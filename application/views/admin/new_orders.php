<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">               
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Заказы
                        <small>Order</small>

                    </h1>  
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/index">Главная</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Заказы
                        </li>
                    </ol>                    
                </div>                 
            </div>
            <!-- /.row -->

            <div class="col-lg-12 tab_margin_top">               
                <form action="order_status" method="POST" class="form-submit">
                    <table class='col-lg-12 table-bordered table-responsive table'>
                        <tbody>
                        <thead>
                        <th>
                            #id
                        </th>
                        <th class='col-lg-8'>
                            Наименование
                        </th>
                        <th class='col-lg-4'>
                            Покупатель/Продавец
                        </th>  
                        <th>
                            #
                        </th> 

                        </thead>
                        <?php
                        if (!empty($order)) {
                            foreach ($order as $item) {
                                if ($item['a_status'] == 'new') {
                                    $style = 'style="background-color : rgba(171, 222, 249, 0.48);"';
                                    $btn_name = '<i class = "fa fa-eye"></i>';
                                } else {
                                    $style = '';
                                    $btn_name = '<i class = "fa fa-eye-slash"></i>';
                                }

                                $buyer_data = unserialize($item['buyer_data']);
                                $adress = unserialize($item['adress']);
                                $seller_data = unserialize($item['seller_data']);
                                ?>
                                <tr <?= $style ?>>
                                    <td><?= $item['id'] ?></td>
                                    <td>
                                        <h3>
                                            <?= $item['name'] ?>
                                        </h3>
                                        <hr>
                                        <div class="col-lg-7">
                                            <img src="<?= $item['image'] ?>" alt="" width="300"> 
                                        </div>                                        
                                        <div class="col-lg-4">
                                            <table class='table-bordered table-responsive table' <?= $style ?>>                                            
                                                <tr>
                                                    <td><label>Цена за единицу:</label></td>
                                                    <td><?= $item['price'] ?> <?= $item['currency'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td> <label>Количество:</label></td>
                                                    <td><?= $item['quantity'] ?></td>
                                                </tr>
                                                <tr>
                                                    <td> <label>Цена ИТОГО:</label></td>
                                                    <td><?= $item['price'] * $item['quantity'] ?> <?= $item['currency'] ?></td>   
                                                </tr>
                                                <tr>
                                                    <td> <label>Доставка:</label></td>
                                                    <td><?= $item['type_of_deliverance'] ?></td>   
                                                </tr>
                                                <tr>
                                                    <td><label>Оплата:</label></td>
                                                    <td><?= $item['type_of_order'] ?></td>   
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="col-lg-12 tab_margin_top">
                                            <hr>
                                            <div class="pull-right">
                                                <label>
                                                    Дата:
                                                </label>  
                                                <span><?= $item['date'] ?> </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <h4>Покупатель:</h4>
                                        <?
                                        echo '<label>Имя: </label>  '.$buyer_data['name'].'<br>';
                                        echo '<label>Фамилия: </label> '.$buyer_data['surname'].'<br>';
                                        echo '<label>Em@il: </label>  '.$buyer_data['email'].'<br>';                                   
                                        echo '<label>Телефон:</label> '.$buyer_data['phone'].'<br>';
                                        echo '<label>Область:</label> '.$adress['location'].'<br>';
                                        echo '<label>Город:</label> '.$adress['city'].'<br>';                                    
                                        ?>
                                        <hr>
                                        <h4>Продавец:</h4>
                                        <?
                                        echo '<label>Имя: </label>  '.$seller_data['name'].'<br>';
                                        echo '<label>Фамилия: </label> '.$seller_data['surname'].'<br>';
                                        echo '<label>Em@il: </label>  '.$seller_data['email'].'<br>';                                   
                                        echo '<label>Телефон:</label> '.$seller_data['phone'].'<br>';
                                        echo '<label>Cтрана:</label> '.$seller_data['country'].'<br>';
                                        echo '<label>Город:</label> '.$seller_data['city'].'<br>';  
                                        echo '<label>Улица:</label> '.$seller_data['street'].' <label>Дом</label> '.$seller_data['building'].'<br>'; 
                                        ?>

                                    </td>                                


                                    <td>
                                        <div class="btn-group-vertical">
                                            <button class = "btn btn-info"type = 'submit' name = "status[<?= $item['id'] ?>]"  value = "<?= $item['a_status'] ?>"><?= $btn_name ?></button>
                                            <button class = "btn btn-danger"type = 'submit' name = "del[<?= $item['id'] ?>]"  value = "<?= $item['id'] ?>"><i class="fa fa-trash-o"></i></button>
                                            <button class = "btn btn-success"type = 'submit' name = "edit[<?= $item['id'] ?>]"  value = "<?= $item['id'] ?>"><i class="fa fa-pencil"></i></button>
                                        </div>
                                    </td>

                                </tr>
                                <?php
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </form>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->


