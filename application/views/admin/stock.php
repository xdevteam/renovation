<?php /*
*Template Name: stock
*/
?>
<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">               
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Товары
                        <small>Products</small>
                    </h1>  
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/index">Главная</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> Товары
                        </li>
                    </ol>                    
                </div>                 
            </div>

            <!-- Menu -->

            <div class="row well" id="prod-nav-bar">

                <!-- Filters -->
                <form action='subcat' method='POST'/>
                <div class="col-sm-9 prod-nav-filters">

                    <div class="col-sm-12">
                        <h2 class="col-sm-12 prod-nav-head">Фильтры</h2>
                    </div>

                    <div class="col-sm-5">
                        <h4>Категория</h4>
                        <select id="_prod_cat" class="form-control ajax-first-select">
                            <option value="default">Выберите категорию</option>
                            <?php
                            foreach ($category as $item) {
                                ?>
                                <option value = "<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-sm-5">
                        <h4>Подкатегория</h4>
                        <select id="_prod_subcat" class="form-control ajax-second-select" name='subcat_id' disabled="disabled"></select>
                    </div>

                    <div class="col-sm-2">
                        <input type="submit" id="prod-nav-apply" name='filter' class="btn btn-success" value="Применить"> 
                    </div>

                </div>
                </form>

                <div class="pull-right col-lg-3 col-sm-auto">
                    <a href="<?= base_url('admin'); ?>/product_add" class="btn btn-primary btn-labeled" style="width: 100%;">
                        <span class="btn-label icon fa fa-plus"></span>
                        Добавить товар
                    </a>
                </div>
            </div>


            <!-- Menu end -->

            <div class="col-lg-12 tab_margin_top">               
                <form action="" method="POST" class="form-submit" enctype="multipart/form-data">
                    <table class='col-lg-12 table-bordered table-responsive table table-hover ' >
                        <tbody >
                        <thead>
                        <th >
                            #id
                        </th>
                        <th class='col-lg-6'>
                            Название
                        </th>
                        <th class='col-lg-3'>
                            Фото
                        </th>  
                        <th class='col-lg-3'>
                            Операции
                        </th> 
                        </thead>
                        <?php
                        if (!empty($list)) {
                            foreach ($list as $item) {
                                if ($item['status'] == 'enable') {
                                    $btn_name = '<i class = "fa fa-eye-slash"></i> Скрыть';
                                } else {
                                    $btn_name = '<i class = "fa fa-eye"></i> Показать';
                                }
                                if(empty($item['stock_price']) && $item['stock_price']==0){
                                	
                                	$stock="";
                                	$background="style='background:#fff;'";
                                	$stocks_but='<button class="btn btn-success col-lg-12" type="submit" name="add_stock['.$item["id"].']"><i class="fa fa-plus fa-fw"></i> Сделать Акционым</button>';
                                }else{
                                	$background="style='background:rgba(250, 148, 130, 0.32);'";
                                	$stock=$item['stock_price'];
                                	$stocks_but='<button class="btn btn-danger col-lg-12"type="submit" name="delete_stock['.$item["id"].']" value="0"><i class="fa fa-trash-o"></i> Убрать из Акций</button>
';
                                }
                                if(empty($item['recomendation']) || $item['recomendation']=0){
                                $recomend='<button class="btn btn-success col-lg-12" type="submit" value="1" name="recomend['.$item["id"].']"><i class="fa fa-fw fa-thumbs-up"></i> Рекомендовать</button>';
                                }else{
                                $recomend='<button class="btn btn-danger col-lg-12" type="submit" value="0" name="recomend['.$item["id"].']"><i class="fa fa-fw fa-thumbs-down"></i>Убрать из рекомендаций</button>';
                                }
                                ?>
                                <tr <?=$background?>>
                                    <td style="vertical-align: middle;"class="text-center"><?= $item['id'] ?></td>
                                    <td style="vertical-align: middle;" class="text-center" ><h4><a href="<?= base_url('admin/edit_product/' . $item['id']) ?>"><?= $item['name'] ?></a></h4></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('admin/edit_product/' . $item['id']) ?>">
                                            <img src='<?= $item['image_path'] ?>'  height="100"  alt=""> 
                                        </a>
                                    </td>                            

                                    <td>
                                    	<?=$recomend?>
                                    	<?=$stocks_but?>
                                    	
                                       	<input name="stock_price[<?= $item['id'] ?>]" class="form-control" placeholder="Введите акционную цену..." value="<?=$stock?>">
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


            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

