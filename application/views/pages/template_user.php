<!-- Page title -->
<div class="page-title">
    <div class="wf-wrap">
        <div class="wf-table">
            <div class="wf-td hgroup">
                <h2 class="product_name_item">
                    <?=$user_cont[0]['name']?>
                </h2>
            </div>
            <div class="wf-td hidden-xs hidden-sm">
                <ul class="breadcrumbs text-normal">
                    <li>
                        <a href="<?= base_url(); ?>default">Главная</a>
                    </li>
                    <li>
                        <a href="<?= base_url($user_cont[0]['link']); ?>" >
                        <?=$user_cont[0]['name']?>
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
        <div class="col-lg-7 col-md-7 col-sm-8 col-xs-8" >
        <div id="content" class="content"> 
            

            <div class="row cat-row trty1">
                <?php include_once'application/views/userpages/'.$user_cont[0]['link'].'.php'; ?> 
            </div>         
            

        </div>
        </div>
            <?php include_once'application/views/templates/brand-list.php'; ?>                    


    </div>
</div>