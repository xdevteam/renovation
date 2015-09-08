<div class="page-title">
    <div class="wf-wrap">
        <div class="wf-table">
            <div class="wf-td hgroup">
                <h2 class="product_name_item">
                    Контакты
                </h2>
            </div>
            <div class="wf-td hidden-xs hidden-sm">
                <ul class="breadcrumbs text-normal">
                    <li>
                        <a href="<?= base_url(); ?>default">Главная</a>
                    </li>
                    <li>
                        <a href="<?= base_url('contact_us'); ?>" >
                            Контакты
                        </a>
                    </li>

                </ul>
            </div>
        </div>

    </div>
</div>
<!-- Page title -->
<!-- Main Content -->
<div id="main" class="cat-main">
    <div class="container wf-wrap clearfix" id="main_wrapper_wf">
        <div class="row">
        <?php include_once'application/views/templates/category-sidebar.php'; ?>
        <div class="col-lg-7 col-md-7 col-sm-8 col-xs-12" >
            <div id="content" class="content">

                <div class="row cat-row trty2">
                    <h1>Контактная информация:</h1>
                    
                    <p><strong>Реквизиты:</strong> </p>
                        <p>
                            <strong>ИНН:</strong>  <?if(!empty($inn)) : echo $inn; endif;?>
                            <br> 
                            <strong>ОГРН:</strong>  <?if(!empty($ogrn)) : echo $ogrn; endif;?>
                        </p>
                    <p><strong>Наш адрес:</strong></p>
                    <address>
                    <? if (!empty($street_build)){ ?>
                    <?=$street_build?> 
                    <? } ?>
                    <? if (!empty($street_build)){ ?>
                    <?=$city?>                   
                    <? } ?>
                    </address>
                    <p><strong>Наш график работы:</strong></p>
                    <table>
                        <tbody>
                             <? if (!empty($worktime)){ ?>
                            <tr>
                                <td>Понедельник-пятница</td><td><?=$worktime?></td>
                            </tr>
                            <? } ?>
                            <? if (!empty($worktime_2)){ ?>
                            <tr>
                                <td>Cуббота</td><td><?=$worktime_2?></td>
                            </tr>
                            <? } ?>
                            <? if (!empty($worktime_3)){ ?>
                            <tr>
                                <td>Воскресенье</td><td><?=$worktime_3?></td>
                            </tr>
                            <? } ?> 
                        </tbody></table>


                    <div class="phne"><strong>Наши телефоны:</strong> 
                        <? if (!empty($phone1)){ ?>
                        <p><?=$phone1?></p>
                        <? } ?> 
                        <? if (!empty($phone2)){ ?>
                        <p><?=$phone2?></p>
                        <? } ?> 
                        
                    </div>
                    <div class="map01">
                         <? if (!empty($map_office)){ ?>
                        <p><?=$map_office?></p>
                        <? } ?> 
                    </div>
                    <h2>Схема проезда:</h2>                    
                        <? if (!empty($route_path)){ ?>
                        <p><?=$route_path?></p>
                        <? } ?> 
                    <? if (!empty($map_shops)){?>  
                    <h2 >Наши магазины:</h2>
                    <?=$map_shops;?>
                    <? } ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2>Отправить Запрос:</h2>
                    <form action="" id="query_user" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email адрес:</label>
                            <input type="email" class="form-control" id="InputEmail" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Имя:</label>
                            <input type="text" class="form-control" id="InputName" placeholder="Имя">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Телефон:</label>
                            <input type="text" class="form-control" id="InputPhone" placeholder="Телефон">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Тема:</label>
                            <input type="text" class="form-control" id="InputThemed" placeholder="Тема">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Ваше сообщение:</label>
                            <textarea class="form-control" id="message" rows="3"></textarea>
                        </div>

                        <button type="button" id="send_message"  class="btn btn-default">Отправить</button>
                    </form>
                </div>




                </div>         
                <div >
                    <?php
                    ?>   
                </div>

            </div>
        </div>
        <?php include_once'application/views/templates/brand-list.php'; ?>                    


        </div></div>
</div>