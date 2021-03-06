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
                        
                    <h2 >Наши магазины:</h2>
                    <?=$map_shops;?>
                    <!-- <div class="map02 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d201892.21830307692!2d132.34098221350666!3d61.059477865561554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5bf88b42df2a3a2b%3A0x62b72ca5054674c9!2z0JDQsdCw0LPQsCwg0KDQtdGB0L8uINCh0LDRhdCwICjQr9C60YPRgtC40Y8pLCDQoNC-0YHRgdC40Y8sIDY3ODYwNA!5e0!3m2!1sru!2sua!4v1440954062043" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                    <div class="map02 col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14601.0684447597!2d148.14149784999995!3d62.77746!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x59616511393e9b2f%3A0x4124bfff0ff513ab!2z0KHRg9GB0YPQvNCw0L0sINCc0LDQs9Cw0LTQsNC90YHQutCw0Y8g0L7QsdC7Liwg0KDQvtGB0YHQuNGPLCA2ODYzMTQ!5e0!3m2!1sru!2sua!4v1440954139153" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div> -->
                    
                    <h2>Отправить Запрос:</h2>
                    <form action="<?=base_url()?>add_query" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email адрес:</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Имя:</label>
                            <input type="text" class="form-control" id="exampleInputName" placeholder="Имя">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Телефон:</label>
                            <input type="text" class="form-control" id="exampleInputPhone" placeholder="Телефон">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Тема:</label>
                            <input type="text" class="form-control" id="exampleInputThemed" placeholder="Тема">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName">Ваше сообщение:</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-default">Отправить</button>
                    </form>




                </div>         
                <div >
                    <?php
                    ?>   
                </div>

            </div>
        </div>
        <?php include_once'application/views/templates/brand-list.php'; ?>                    


    </div>
</div>