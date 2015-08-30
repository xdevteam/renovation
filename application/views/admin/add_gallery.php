 <?php if(empty($gallery_info)){
                $action="add_gallery_img";
                $add="Добавить";
                $small="Add";
            }else{
                $action=base_url()."admin/update_gallery_img";
                $add="Редактировать";
                $small="Edit";
            }   ?>         
<div id="wrapper">

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">               
                <div class="col-lg-12">
                    <h1 class="page-header">
                        <?=$add?> картинку
                        <small><?=$small?> picture</small>
                    </h1>  
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/index">Главная</a>
                        </li>
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?= base_url(); ?>admin/gallery">Галерея</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-file"></i> <?=$add?> картинку
                        </li>
                    </ol>                    
                </div>                 
            </div>
            <!-- /.row -->

            <div class="col-lg-6 tab_margin_top"> 
           
                <form action="<?=$action?>" method="POST" class="form-submit" enctype="multipart/form-data">
                    <?if(!(empty($gallery_info[0]['id']))) { ?>
                        <input type="hidden" name="id" value="<?=$gallery_info[0]['id']?>">
                    <? }?>
                    <label>Название</label>
                    <input class='form-control' name='name' placeholder="(Максимум 250 символов)" type='text' 
                    value="<? if(!empty($gallery_info[0]['name'])){ ?><?=$gallery_info[0]['name']?><? } ?>"/>
                    

                    <label>Статус</label>
                    <select class='form-control' name='status'>
                        <option value='enable'>Показывать</option>
                        <option value='disable'>Скрывать</option>
                    </select>
                    

                    <!-- text Wysiwyg editor -->
                    <textarea  name="description" id="editor1" cols="45" rows="5">
                        <? if(!empty($gallery_info[0]['description'])){ ?>
                        <?=$gallery_info[0]['description']?>
                        <? } ?>
                    </textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace('editor1');
                    </script>
                    <!-- end text Wysiwyg editor -->
                    <p>
                        <label for="prod_photo">
                            Фото
                        </label>
                        <?php if(!empty($gallery_info[0]['image_path'])){
                            ?><img src="<?=$gallery_info[0]['image_path']?>" width="300" title="picture" alt="">
                            <input type="hidden" name="old_src" value="<?=$gallery_info[0]['image_path']?>">
                            <?php
                        }
                        ?>
                        <input type="file" id="prod_photo" name="prod_photo" accept="image/*">                   
                    </p>
                     <div class='tab_margin_top'>
                        <button class="btn btn-info" type='submit' name="save_gallery" value=""><i class="fa fa-save"></i> Сохранить</button>
                        <button class="btn btn-danger" type='reset' name="reset" value=""><i class="fa fa-remove"></i> Сбросить</button>
                    </div>
                </form>
            </div>        

            
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->


